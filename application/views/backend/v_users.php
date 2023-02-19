<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Tài khoản</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="Nhóm 4" />
        <link rel="shortcut icon" href="<?php echo base_url().'assets/images/favicon.png'?>">
        <!-- Styles -->
        <link href="<?php echo base_url().'assets/plugins/pace-master/themes/blue/pace-theme-flash.css'?>" rel="stylesheet"/>
        <link href="<?php echo base_url().'assets/plugins/uniform/css/uniform.default.min.css'?>" rel="stylesheet"/>
        <link href="<?php echo base_url().'assets/plugins/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url().'assets/plugins/fontawesome/css/font-awesome.css'?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url().'assets/plugins/line-icons/simple-line-icons.css'?>" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo base_url().'assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css'?>" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo base_url().'assets/plugins/waves/waves.min.css'?>" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo base_url().'assets/plugins/switchery/switchery.min.css'?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url().'assets/plugins/3d-bold-navigation/css/style.css'?>" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo base_url().'assets/plugins/slidepushmenus/css/component.css'?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url().'assets/plugins/datatables/css/jquery.datatables.min.css'?>" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo base_url().'assets/plugins/datatables/css/jquery.datatables_themeroller.css'?>" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo base_url().'assets/plugins/bootstrap-datepicker/css/datepicker3.css'?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url().'assets/plugins/select2/css/select2.min.css'?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url().'assets/plugins/toastr/jquery.toast.min.css'?>" rel="stylesheet" type="text/css"/>
        <!-- Theme Styles -->
        <link href="<?php echo base_url().'assets/css/modern.min.css'?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url().'assets/css/themes/green.css'?>" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url().'assets/css/custom.css'?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url().'assets/css/dropify.min.css'?>" rel="stylesheet" type="text/css">

        <script src="<?php echo base_url().'assets/plugins/3d-bold-navigation/js/modernizr.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/offcanvasmenueffects/js/snap.svg-min.js'?>"></script>
        
       
    </head>
    <body class="page-header-fixed  compact-menu  pace-done page-sidebar-fixed">
        <div class="overlay"></div>
        
        <main class="page-content content-wrap">
        <div class="navbar">
                <div class="navbar-inner">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                        <a href="<?php echo site_url('backend/dashboard');?>" class="logo-text"><span>LIFE BLOG</span></a>
                    </div><!-- Logo Box -->
                    <div class="search-button">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="topmenu-outer">
                        <div class="top-menu">
                            <ul class="nav navbar-nav navbar-left">
                                <li>		
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <?php 
                                    $count_inbox = $this->db->get_where('tbl_inbox', array('inbox_status' => '0'));
                                ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="badge badge-success pull-right"><?php echo $count_inbox->num_rows();?></span></a>
                                    <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                                        
                                        <li><p class="drop-title">Bạn có <?php echo $count_inbox->num_rows();?> tin nhắn mới !</p></li>
                                        <li class="dropdown-menu-list slimscroll messages">
                                            <ul class="list-unstyled">
                                                <?php 
                                                    $query_msg = $this->db->get_where('tbl_inbox', array('inbox_status' => '0'), 6);
                                                    foreach ($query_msg->result() as $row) :
                                                ?>
                                                <li>
                                                    <a href="<?php echo site_url('backend/inbox');?>">
                                                        <div class="msg-img"><div class="online on"></div><img class="img-circle" src="<?php echo base_url().'assets/images/user_blank.png';?>" alt=""></div>
                                                        <p class="msg-name"><?php echo $row->inbox_name;?></p>
                                                        <p class="msg-text"><?php echo word_limiter($row->inbox_message,5);?></p>
                                                        <p class="msg-time"><?php echo date('d-m-Y H:i:s', strtotime($row->inbox_created_at));?></p>
                                                    </a>
                                                </li>
                                                <?php endforeach;?>
                                                
                                            </ul>
                                        </li>
                                        <li class="drop-all"><a href="<?php echo site_url('backend/inbox');?>" class="text-center">Tất cả tin nhắn</a></li>
                                    </ul>
                                </li>
                                <?php
                                    $count_comment = $this->db->get_where('tbl_comment', array('comment_status' => '0'));
                                ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-comment"></i><span class="badge badge-success pull-right"><?php echo $count_comment->num_rows();?></span></a>
                                    <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                                        <li><p class="drop-title">Bạn có <?php echo $count_comment->num_rows();?> bình luận mới !</p></li>
                                        <li class="dropdown-menu-list slimscroll messages">
                                            <ul class="list-unstyled">
                                                <?php 
                                                    $query_cmt = $this->db->get_where('tbl_comment', array('comment_status' => '0'), 6);
                                                    foreach ($query_cmt->result() as $row) :
                                                ?>
                                                <li>
                                                    <a href="<?php echo site_url('backend/comment/unpublish');?>">
                                                        <div class="msg-img"><div class="online on"></div><img class="img-circle" src="<?php echo base_url().'assets/images/user_blank.png';?>" alt=""></div>
                                                        <p class="msg-name"><?php echo $row->comment_name;?></p>
                                                        <p class="msg-text"><?php echo word_limiter($row->comment_message,5);?></p>
                                                        <p class="msg-time"><?php echo date('d-m-Y H:i:s', strtotime($row->comment_date));?></p>
                                                    </a>
                                                </li>
                                                <?php endforeach;?>
                                                
                                            </ul>
                                        </li>
                                        <li class="drop-all"><a href="<?php echo site_url('backend/comment/unpublish');?>" class="text-center">Tất cả bình luận</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name"><?php echo $this->session->userdata('name');?><i class="fa fa-angle-down"></i></span>
                                        <?php
                                            $user_id=$this->session->userdata('id');
                                            $query=$this->db->get_where('tbl_user', array('user_id' => $user_id));
                                            if($query->num_rows() > 0):
                                            $row = $query->row_array();
                                        ?>
                                        <img class="img-circle avatar" src="<?php echo base_url().'assets/images/'.$row['user_photo'];?>" width="40" height="40" alt="">
                                        <?php else:?>
                                        <img class="img-circle avatar" src="<?php echo base_url().'assets/images/user_blank.png';?>" width="40" height="40" alt="">
                                        <?php endif;?>
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="<?php echo site_url('backend/change_pass');?>"><i class="fa fa-key"></i>Đổi mật khẩu</a></li>
                                        <li role="presentation"><a href="<?php echo site_url('backend/comment/unpublish');?>"><i class="fa fa-comment"></i>Bình luận<span class="badge badge-success pull-right"><?php echo $count_comment->num_rows();?></span></a></li>
                                        <li role="presentation"><a href="<?php echo site_url('backend/inbox');?>"><i class="fa fa-envelope"></i>Tin nhắn<span class="badge badge-success pull-right"><?php echo $count_inbox->num_rows();?></span></a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation"><a href="<?php echo site_url('logout');?>"><i class="fa fa-sign-out m-r-xs"></i>Đăng xuất</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('logout');?>" class="log-out waves-effect waves-button waves-classic">
                                        <span><i class="fa fa-sign-out m-r-xs"></i>Đăng xuất</span>
                                    </a>
                                </li>
                            </ul><!-- Nav -->
                        </div><!-- Top Menu -->
                    </div>
                </div>
            </div><!-- Navbar -->
            <div class="page-sidebar sidebar">
                <div class="page-sidebar-inner slimscroll">
                    <div class="sidebar-header">
                    <div class="sidebar-profile">
                            <?php
                                $user_id=$this->session->userdata('id');
                                $query=$this->db->get_where('tbl_user', array('user_id' => $user_id));
                                if($query->num_rows() > 0):
                                $row = $query->row_array();
                            ?>
                            <a href="javascript:void(0);">
                                <div class="sidebar-profile-image">
                                    <img src="<?php echo base_url().'assets/images/'.$row['user_photo'];?>" class="img-circle img-responsive" alt="">
                                </div>
                                <div class="sidebar-profile-details">
                                    <span><?php echo $this->session->userdata('name');?><br>
                                    <?php if($row['user_level']=='1'):?>
                                    <small>Quản trị viên</small>
                                    <?php else:?>
                                    <small>Tác giả</small>
                                    <?php endif;?>
                                </span>
                                </div>
                            </a>
                            <?php else:?>
                            <a href="javascript:void(0);">
                                <div class="sidebar-profile-image">
                                    <img src="<?php echo base_url().'assets/images/user_blank.png';?>" class="img-circle img-responsive" alt="">
                                </div>
                                <div class="sidebar-profile-details">
                                    <span><?php echo $this->session->userdata('name');?><br>
                                    <?php if($row['user_level']=='1'):?>
                                    <small>Quản trị viên</small>
                                    <?php else:?>
                                    <small>Tác giả</small>
                                    <?php endif;?>
                                </span>
                                </div>
                            </a>
                            <?php endif;?>
                        </div>
                    </div>
                    <ul class="menu accordion-menu">
                        <li><a href="<?php echo site_url('backend/dashboard');?>" class="waves-effect waves-button"><span class="menu-icon icon-home"></span><p>Bảng điều khiển</p></a></li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-pin"></span><p>Bài đăng</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo site_url('backend/post/add_new');?>">Thêm bài</a></li>
                                <li><a href="<?php echo site_url('backend/post');?>">Danh sách</a></li>
                                <li><a href="<?php echo site_url('backend/category');?>">Thể loại</a></li>
                                <li><a href="<?php echo site_url('backend/tag');?>">Tag</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo site_url('backend/inbox');?>" class="waves-effect waves-button"><span class="menu-icon icon-envelope"></span><p>Tin nhắn</p></a></li>
                        <li><a href="<?php echo site_url('backend/comment');?>" class="waves-effect waves-button"><span class="menu-icon icon-bubbles"></span><p>Bình luận</p></a></li>
                        <li><a href="<?php echo site_url('backend/subscriber');?>" class="waves-effect waves-button"><span class="menu-icon icon-users"></span><p>Đăng ký</p></a></li>
                        <li><a href="<?php echo site_url('backend/testimonial');?>" class="waves-effect waves-button"><span class="menu-icon icon-like"></span><p>Lời chứng thực</p></a></li>
                        <?php if($this->session->userdata('access')=='1'):?>
                        <li><a href="<?php echo site_url('backend/users');?>" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>Tài khoản</p></a></li>
                        <li class="droplink"><a href="<?php echo site_url('backend/settings');?>" class="waves-effect waves-button"><span class="menu-icon icon-settings"></span><p>Cài đặt</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo site_url('backend/settings');?>">Website</a></li>
                                <li><a href="<?php echo site_url('backend/home_setting');?>">Trang chủ</a></li>
                                <li><a href="<?php echo site_url('backend/about_setting');?>">About</a></li>
                                <li><a href="<?php echo site_url('backend/navbar');?>">Navbar</a></li>
                            </ul>
                        </li>
                        <?php else:?>
                        <?php endif;?>
                        <li><a href="<?php echo site_url('logout');?>" class="waves-effect waves-button"><span class="menu-icon icon-logout"></span><p>Đăng xuất</p></a></li>
                        
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->
            <div class="page-inner">
                
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                
                                <div class="panel-body">
                                <button type="button" class="btn btn-success m-b-sm" data-toggle="modal" data-target="#myModal">Thêm mới</button>
                                  
                                    <table id="mytable" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Ảnh</th>
                                                <th>Tên</th>
                                                <th>Tên tài khoản</th>
                                                <th>Mật khẩu</th>
                                                <th>Quyền</th>
                                                <th>Trạng thái</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no=0;
                                                foreach ($data->result() as $row):
                                                    $no++;
                                            ?>
                                            <tr>
                                                <td style="vertical-align: middle;"><?php echo $no;?></td>
                                                <td style="vertical-align: middle;">
                                                    <?php if(empty($row->user_photo)):?>
                                                    <img class="img-circle" width="50" src="<?php echo base_url().'assets/images/user_blank.png';?>">
                                                    <?php else:?>
                                                    <img class="img-circle" width="50" src="<?php echo base_url().'assets/images/'.$row->user_photo;?>">
                                                    <?php endif;?>
                                                </td>
                                                <td style="vertical-align: middle;"><?php echo $row->user_name;?></td>
                                                <td style="vertical-align: middle;"><?php echo $row->user_email;?></td>
                                                <td style="vertical-align: middle;"><?php echo $row->user_password;?></td>
                                                <td style="vertical-align: middle;">
                                                    <?php 
                                                        if($row->user_level=='1'){
                                                            echo "Quản trị viên";
                                                        }else{
                                                            echo "Tác giả";
                                                        }
                                                    ?>    
                                                </td>
                                                <?php if($row->user_status=='1'):?>
                                                    <td style="vertical-align: middle;"><a href="<?php echo base_url().'backend/users/lock/'.$row->user_id;?>" class="btn"><span class="icon-lock-open" title="Khóa"></span></a></td>
                                                <?php else:?>
                                                    <td style="vertical-align: middle;"><a href="<?php echo base_url().'backend/users/unlock/'.$row->user_id;?>" class="btn"><span class="icon-lock" title="Mở Khóa"></span></a></td>
                                                <?php endif;?>
                                                <td style="vertical-align: middle;">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            Thao tác <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#ModalEdit<?php echo $row->user_id;?>"><span class="icon-pencil"></span> Sửa</a></li>
                                                            <li><a href="javascript:void(0);" class="delete" data-userid="<?php echo $row->user_id;?>"><span class="icon-trash"></span> Xóa</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                       </table>  
                                </div>
                            </div>
                                   
                            
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <p class="no-s"><?php echo date('Y');?> &copy; Nhóm 4.</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        
        <div class="cd-overlay"></div>

        <!-- Modal -->
        <form id="add-row-form" action="<?php echo base_url().'backend/users/insert'?>" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Thêm tài khoản mới</h4>
                    </div>
                    <div class="modal-body">
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="file" name="filefoto" class="dropify" data-height="220">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="nama" class="form-control" placeholder="Tên" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password2" class="form-control" placeholder="Xác nhận mật khẩu" required>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="level" required>
                                            <option value="">Chưa chọn</option>
                                            <option value="1">Quản trị viên</option>
                                            <option value="2">Tác giả</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-success">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
        </form>

        <?php 
            foreach ($data->result() as $row):
        ?>
        <!-- Modal -->
        <form id="add-row-form" action="<?php echo base_url().'backend/users/update'?>" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="ModalEdit<?php echo $row->user_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Chỉnh sửa tài khoản</h4>
                    </div>
                    <div class="modal-body">
                            
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                <input type="file" name="filefoto" class="dropify" data-height="220" data-default-file="<?php echo base_url().'assets/images/'.$row->user_photo;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" name="nama" value="<?php echo $row->user_name;?>" class="form-control" placeholder="Tên" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" value="<?php echo $row->user_email;?>" class="form-control" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password2" class="form-control" placeholder="Xác nhận mật khẩu">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="level" required>
                                                <?php if($row->user_level=='1'):?>
                                                <option value="1" selected>Quản trị viên</option>
                                                <option value="2">Tác giả</option>
                                                <?php else:?>
                                                <option value="1">Quản trị viên</option>
                                                <option value="2" selected>Tác giả</option>
                                                <?php endif;?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="user_id" value="<?php echo $row->user_id;?>" required>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-success">Cập nhập</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
	   <?php endforeach;?>

       <!-- Modal hủy-->
        <form id="add-row-form" action="<?php echo base_url().'backend/users/delete'?>" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Xóa tài khoản</h4>
                    </div>
                    <div class="modal-body">
                            <strong>Bạn có muốn xóa tài khoản này?</strong>
                            <div class="form-group">
                                <input type="hidden" id="txt_kode" name="kode" class="form-control" placeholder="Tên" required>
                            </div>
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                        <button type="submit" id="add-row" class="btn btn-danger">Xóa</button>
                    </div>
                </div>
            </div>
        </div>
        </form>

        <!-- Javascripts -->
        <script src="<?php echo base_url().'assets/plugins/jquery/jquery-2.1.4.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/jquery-ui/jquery-ui.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/select2/js/select2.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'assets/plugins/pace-master/pace.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/jquery-blockui/jquery.blockui.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/bootstrap/js/bootstrap.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/switchery/switchery.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/uniform/jquery.uniform.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/offcanvasmenueffects/js/classie.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/offcanvasmenueffects/js/main.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/waves/waves.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/3d-bold-navigation/js/main.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/jquery-mockjax-master/jquery.mockjax.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/moment/moment.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/datatables/js/jquery.datatables.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/modern.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/dropify.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/toastr/jquery.toast.min.js'?>"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#mytable').DataTable();
                $('.dropify').dropify({
                    defaultFile: '',
                    messages: {
                        default: 'Kéo thả ảnh hoặc nhấp để chọn',
                        replace: 'Đổi',
                        remove:  'Xóa',
                        error:   'Lỗi ảnh'
                    }
                });

                $('.delete').on('click',function(){
                    var userid=$(this).data('userid');
                    $('#ModalDelete').modal('show');
                    $('[name="kode"]').val(userid);
                });
            });
        </script>


        <!--Toast Message-->
        <?php if($this->session->flashdata('msg')=='error'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Thông báo lỗi',
                        text: "Mật khẩu xác nhận không chính xác",
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#FF4859'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='error-pass'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Thông báo lỗi',
                        text: "Mật khẩu tối thiểu 6 ký tự, tối đa 40 ký tự",
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#FF4859'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='error-email'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Thông báo lỗi',
                        text: "Email này đã tồn tại",
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#FF4859'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='error-img'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Thông báo lỗi',
                        text: "Lỗi tải ảnh lên",
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#FF4859'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='success'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Thành công',
                        text: "Tài khoản đã được thêm",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#7EC857'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='info'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Thông báo',
                        text: "Cập nhập tài khoản thành công",
                        showHideTransition: 'slide',
                        icon: 'info',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#00C9E6'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Thành công',
                        text: "Tài khoản đã được xóa",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#7EC857'
                    });
            </script>
        <?php else:?>

        <?php endif;?>

    </body>
</html>