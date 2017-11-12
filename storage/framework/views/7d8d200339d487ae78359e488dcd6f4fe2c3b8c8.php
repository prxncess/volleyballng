<?php $__env->startSection('title'); ?>
    <?php echo e($team->name.' Players'); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section>
        <div id="admin-box" class="well">
            <header>
                <h2>Players</h2>
                <div id="separator"></div>
                <?php if(session('res')): ?>
                    <div class="alert alert-success">
                        <?php echo session('res'); ?>

                    </div>
                <?php endif; ?>
                <small><i><b>Attention</b>: A maximum of 9 players are allow for a team.</i></small>
                <button   class="pull-right btn btn-primary add-player" id="vb-button"><i class="fa fa-plus"></i> Add Player</button>
            </header>
            <div id="tm-players">
                <?php if($team->players->isEmpty()): ?>
                    <div class="alert alert-warning">
                        You currently have no players at the moment. Please Add some players
                    </div>
                <?php else: ?>
                    
                    <div class="row">
                        <?php $__currentLoopData = $team->players; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <div class="col-xs-12 col-sm-4 col-md-4 ">
                                <img src="<?php echo asset('images/team/players/'.$player->player_image); ?>" class="img-responsive">
                                    <a href="<?php echo e(route('showPlayer',$player->id)); ?>" class="text-center"><?php echo $player->fname.' '.$player->lname; ?></a>

                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>


        </div>
    </section>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('adminTeam.popup.newPlayer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('footer-scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function(){

            $('button.add-player').on('click',function(event){
                event.preventDefault();
                $('div#add-player').modal('show')

            })
            //register player
            //save player
            $('button.register-player').on('click',function(){
                $('#player-fname').parent().find('p').html(' ')
                $('#player-lname').parent().find('p').html(' ')
                $('#player-position').parent().find('p').html(' ')
                $('#player-height').parent().find('p').html(' ')
                $('#player-photo').parent().find('p').html(' ')
                var playerForm = new FormData();
                var playerImage=$('div#add-player #member-info div#player-img input[type="file"]')[0].files[0]
                playerForm.append('player_position',$('#player-position').val())
                playerForm.append('player_height',$('#player-height').val())
                playerForm.append('player_lastName',$('#player-lname').val())
                playerForm.append('player_firstName',$('#player-fname').val())
                playerForm.append('player_image',playerImage)
                playerForm.append('_token',$('#_token').val())
                playerForm.append('team_id',$('#index').val())
                //send request to ajax
                $.ajax({
                    url:'<?php echo e(route('AddPlayers')); ?>',
                    type:'POST',
                    data:playerForm,
                    contentType:false,
                    processData:false,
                    success:function(data){
                        if(data.status=='error'){
                            message= data.errors
                            $('#player-fname').parent().find('p').html(''+message.player_firstName[0])
                            $('#player-lname').parent().find('p').html(''+message.player_lastName[0])
                            $('#player-height').parent().find('p').html(''+message.player_height[0])
                            $('#player-position').parent().find('p').html(''+message.player_position[0])
                            $('#player_photo').parent().find('p').html(''+message.player_image[0])

                        }else if(data.status=='player_saved'){
                            $('form.playerForm input[type=reset]').trigger('click');
                            //document.getElementById("m").reset();
                            $('.modal.in').modal('hide');
                            //return true;
                            //change preview image to default
                            //$('#show-player-img').target.src('images/user.jpg');
                            //load all players added
                            //loops player array
                            var players=data.newPlayers;
                            $('#tm-players').html('')
                            var player_preview=""
                            for( i in players){
                                player_preview+='<div class="col-xs-12 col-sm-4 col-md-4"><a href="#"><img src="<?php echo e(asset('images/team/players')); ?>/'+players[i].player_image+'" > <span class="text-center text-capitalize">'+players[i].fname+' '+players[i].lname+'</span> </a></div>'
                                // player_preview+='<div class="media" data-pid="'+players[i].team_id+'"> <div class="media-left"><img src="images/team/players/'+players[i].player_image+'" style="width: 60px;" class="media-object"> </div> <div class="media-body"> <ul class="list-unstyled"> <li><b>Name:</b> <span>'+players[i].fname+' '+players[i].lname+'</span></li> <li><b>Height:</b> <span>'+players[i].height+'</span></li> <li><b>Position:</b> <span>'+players[i].position+'</span></li> <li><a href="#" >remove</a></li> </ul> </div> </div> </div>'

                            }
                            //add_player='<div class="media" data-pid=""> <div class="media-left"><img src="" style="width: 60px;" class="media-object"> </div> <div class="media-body"> <ul class="list-unstyled"> <li><b>Name:</b> <span>John don</span></li> <li><b>Height:</b> <span>200cm</span></li> <li><b>Position:</b> <span>Middle blocker</span></li> <li><a href="#" >remove</a></li> </ul> </div> </div> </div>'

                            $('#tm-players').html(player_preview);
                            $('#show-player-img').attr('src','<?php echo e(asset('images')); ?>/user.jpg')

                        }
                    }
                })
            });

            function showfile(fileInput,img,showName){
                if(fileInput.files[0]){
                    var reader=new FileReader();
                    reader.onload=function(e){
                        $(img).attr('src',e.target.result);
                    }
                    reader.readAsDataURL(fileInput.files[0]);
                    $(showName).text(fileInput.files[0].name);
                }
            }

            $('div#player-img button').on('click',function(){
                $('#player-photo').click();
            })
            $('#player-photo').on('change',function(e){
                showfile(this,'div#player-img img#show-player-img')
            })
        })

    </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('adminTeam.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>