<?php  

    require 'dbh.inc.php';
    session_start();


    $sql = 'SELECT * FROM  tickets ORDER BY created_at';

    $result = mysqli_query($conn, $sql);

    $tickets = mysqli_fetch_all($result, MYSQLI_ASSOC);




    $projectSQL = 'SELECT id,name,developers FROM projects';

    $projectQuery = mysqli_query($conn, $projectSQL);

    $projectNames = mysqli_fetch_all($projectQuery, MYSQLI_ASSOC);

    $userSQL = 'SELECT username FROM users';
    $userQuery = mysqli_query($conn, $userSQL);

    $users = mysqli_fetch_all($userQuery, MYSQLI_ASSOC);


    mysqli_free_result($projectQuery);
    mysqli_free_result($result);
    mysqli_free_result($userQuery);

    mysqli_close($conn);
  

?>







<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BugByte - Tickets</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
 <!-- <link rel="stylesheet" href="css/stylesheet.css"> -->


  

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-bug"></i>
            </div>
            <div class="sidebar-brand-text mx-3">BugByte</div>
          </a>
    
          <!-- Divider -->
          <hr class="sidebar-divider my-0">
    
          <!-- Nav Item - Dashboard -->
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
    
          <!-- Divider -->
          <hr class="sidebar-divider my-0">
    
          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item active">
            <a class="nav-link collapsed" href="tickets.php">
              <i class="fas fa-fw fa-book"></i>
              <span>My Tickets</span>
            </a>
          </li>
    
         <!-- Divider -->
          <hr class="sidebar-divider my-0">
    
          <!-- Nav Item - Utilities Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="projects.php">
              <i class="fas fa-fw fa-wrench"></i>
              <span>My Projects</span>
            </a>
          </li>
    
    
          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">
    
          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline my-5">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>
    
        </ul>
        <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['firstName'] ." " . $_SESSION['lastName'] ?></span>
                
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tickets</h1>
            

            <div class="in h5 mb-0 text-gray-700">
              <label for="ticketSort">Sort By:</label>
              <select id="ticketSort">
                <option value="priority">Priority</option>
                <option value="dateSubmitted">Date Submitted</option>
                <option value="ticketType">Ticket Type</option>
                
        
              </select>
        
            </div>
          </div>
          <hr>
          <!-- End Page Heading-->

          
          <?php 

            $count = 0;
          
            foreach($tickets as $ticket): 
              if($ticket['status'] != 'Complete' && ($ticket['developer'] == $_SESSION['username'] || $ticket['created_by']==$_SESSION['username'])):
                if($count % 2 == 0):
            
                  echo '<div class="row justify-content-around">';

                endif; 
          ?>

          <!-- Dropdown Card  -->
          <div class="card shadow mb-4 col-5">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-gradient-light">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo htmlspecialchars($ticket['title'])?></h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Choose Action:</div>
                      <a class="dropdown-item" href="editTicket.php?id=<?php echo $ticket['id']?>">Edit</a>

                      <form action="removeTicket.php" method="POST">
                      <input type="hidden" name="id_to_delete" value = "<?php echo $ticket['id']?>">
                      <button type ="submit" name="deleteTicket" value="deleteTicket" class="dropdown-item">Delete</button>
                      <div class="dropdown-divider"></div>

                      <button type ="submit" name="completeTicket" value="completeTicket" class="dropdown-item">Mark as Complete</button>
                      </form>

                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="container-fluid card-body pt-1">
                  <div class="row justify-content-between">
                    <div class="col-sm-4">
                      <span class="font-weight-bold">Project </span>
                      <br>
                      <span><?php echo htmlspecialchars($ticket['project'])?></span>
                    </div>

                    <div class="col-sm-4">
                      <span class="font-weight-bold my-2">Priority </span>
                      <br>
                      <span class="text-danger font-weight-bold"><?php echo htmlspecialchars($ticket['priority'])?></span>
                    

                    </div>

                  </div>
                  <hr class="mt-1">
                  <div class="row justify-content-between">
                    <div class="col-sm-4">
                      <span class="font-weight-bold">Type</span>
                      <br>
                      <span><?php echo htmlspecialchars($ticket['type'])?></span>
                    </div>

                    <div class="col-sm-5">
                      <span class="font-weight-bold my-2">Assigned Developer </span>
                      <br>
                      <span><?php echo htmlspecialchars($ticket['developer'])?></span>
                    

                    </div>

                  </div>
                  
                  <hr class="my-1">

                  <div class="row">
                    <div class="col-sm-12"> 
                      <span class="font-weight-bold my-2">Description</span>
                      <br>
                      <span class="font-weight-light"><?php echo htmlspecialchars($ticket['description'])?></span>
                    </div>
                  </div>

                  <hr class="mt-2">

                  <div class="row justify-content-end pb-0">
                    <small>Date Submitted: <?php echo $ticket['created_at']?></small>

                  </div>

                </div>
          </div>

              

          <?php 
          $count++;
          
          
          if($count%2==0):

              echo '</div>';
              

              endif;

               
              endif;
              endforeach;
          
          ?>



        </div>

        <!-- end of container-fluid -->

        <nav class="navbar navbar-dark justify-content-end">
          <button type="button" class="btn btn-outline-info col-2 mx-5"  data-toggle="modal" data-target="#addTicketModal" id="myBtn">Add Ticket</button>
        </nav>


      </div>
      
      <!-- End of Main Content -->
      
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; BugByte 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Add Ticket Modal -->
  <!-- Modal -->
  <div class="modal fade" id="addTicketModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">New Ticket</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <form action="addTicket.php" method="POST">
            <div class = "container">
              
                <!--ROW 1 TITLE AND PROJECT-->
                <div class = "row justify-content-between mb-3">

                    <div class = "col-sm-6">
                      <label for="title">Title:</label>
                      <input class="form-control" name="title" id="title" type="text">
                    </div>

                    <div class = "col-sm-6">
                      <label for="project">Project:</label>
                      <select class = "form-control" name="project" id="project">
                      
                        <?php foreach($projectNames as $project): 
                                $devArray = unserialize($project['developers']);
                                if(in_array($_SESSION['username'],$devArray)):   
                          
                        ?>
                        <option value="<?php echo $project['name']?>"><?php echo $project['name'] ?></option>
                        <?php 
                         endif;
                         endforeach; 
                         ?>


                      </select>
                    </div>
                </div>
                
                <!--ROW 2 PRIORITY & DEVELOPER SELECTION-->
                <div class = "row justify-content-between mb-3">


                    <div class = "col-sm-6">
                      <label class="mb-0" for="priority">Priority:</label>
                      <select class = "form-control mb-2" name="priority">
                        <option value="LOW">Low</option>
                        <option value="MEDIUM">Medium</option>
                        <option value="HIGH">High</option>
                        <option value="CRITICAL">Critical</option>

                      </select>

                      <label class="mb-0" for="type">Ticket Type:</label>
                      <select class = "form-control mb-2" name="type">
                        <option value="Bug Fix">Bug Fix</option>
                        <option value="Feature Request">Feature Request</option>
                        <option value="Project Task">Project Task</option>
                        <option value="Other">Other</option>

                      </select>
                      
                    </div>

                    <div class = "col-sm-6">
                      <label class="mb-0" for="developer">Assigned Developer: </label>
                      <select class="form-control mdb-select md-form" name="developer" id="developer" searchable="Search username..">
                      <?php 

                        foreach($users as $user):

                        echo '<option value="'. $user['username']. '">'. $user['username'] . '</option>';

                        endforeach;
                      ?>
                      </select>
                    </div>

                </div>
  
                <!--ROW 3 ADDITONAL COMMENTS-->
                <div class = "row mb-3">
              
                  <label for="description">Comments:</label>
                  <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                  
                

                </div>

              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name = "addTicket" class="btn btn-primary" value="addTicket">Add Ticket</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>


</body>

</html>
