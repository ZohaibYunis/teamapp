<div class="sidebar-menu">
    <header class="logo1">
        <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
    </header>
    <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
    <div class="menu">
        <ul id="menu" >
            
            <li>
                <a href="index.php">
                    <i class="fa fa-tachometer"></i> 
                    <span>Dashboard</span>
                    <div class="clearfix"></div>
                </a>
            </li>
            
            <li id="menu-academico" >
                
                <a href="#">
                    <i class="fa fa-user-o" aria-hidden="true"></i>  
                    <span>Users</span> 
                    <span class="fa fa-angle-right" style="float: right"></span>
                    <div class="clearfix"></div>
                </a>
                
                <ul id="menu-academico-sub" >
                    
                    <li id="menu-academico-boletim" >
                        <a href="<?php echo base_url . 'addUser.php' ?>">
                            Add User
                        </a>
                    </li>
                    
                    <li id="menu-academico-avaliacoes" >
                        <a href="<?php echo base_url . 'viewUsers.php' ?>">
                            View Users
                        </a>
                    </li>
                    
                </ul>
                
            </li>
            
            <li id="menu-academico" >
                
                <a href="#">
                    <i class="fa fa fa-users"></i>  
                    <span>Teams</span> 
                    <span class="fa fa-angle-right" style="float: right"></span>
                    <div class="clearfix"></div>
                </a>
                
                <ul id="menu-academico-sub" >
                    
                    <li id="menu-academico-boletim" >
                        <a href="<?php echo base_url . 'addTeam.php' ?>">
                            Add Team
                        </a>
                    </li>
                    
                    <li id="menu-academico-avaliacoes" >
                        <a href="<?php echo base_url . 'viewTeams.php' ?>">
                            View Team
                        </a>
                    </li>
                    
                </ul>
            </li>
            
            <li id="menu-academico" >
                
                <a href="#">
                    <i class="fa fa fa-users"></i>  
                    <span>User Teams</span> 
                    <span class="fa fa-angle-right" style="float: right"></span>
                    <div class="clearfix"></div>
                </a>
                
                <ul id="menu-academico-sub" >
                    
                    <li id="menu-academico-boletim" >
                        <a href="<?php echo base_url . 'addUserTeam.php' ?>">
                            Add User Team
                        </a>
                    </li>
                    
                    <li id="menu-academico-avaliacoes" >
                        <a href="<?php echo base_url . 'viewUsersTeams.php' ?>">
                            View Users Teams
                        </a>
                    </li>
                    
                </ul>
            </li>
            
        </ul>
    </div>
</div>