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
                <li class="nav-item w-sm-100 text-center">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item w-sm-100 text-center">
                    <a href="../register.php" class="nav-link">Register</a>
                </li>
                <li class="nav-item w-sm-100 text-center">
                    <a href="../visitor/details.php" class="nav-link">Details</a>
                </li>
                <li class="nav-item text-center">
                    <a href="../login.php" class="nav-link">Login</a>
                </li>
                
              
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>


                <?php 
                    $query4 = "SELECT * FROM notification ORDER BY time DESC LIMIT 3";
                    $result4 = mysqli_query($conn, $query4);

                    while($row = mysqli_fetch_array($result4))
                    {                       
                ?>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-info">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                        </div>
                        <div>
                        <div class="small text-gray-500"><?php echo $row['time'] ?></div>
                        <?php echo $row['notification'] ?>
                    </div>
                </a>
                            
                        </tbody>
                        <?php } ?>
           
                <a class="dropdown-item text-center small text-gray-500" href="notifications.php">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">
                    <?php 
                        $sql3 = "SELECT * FROM notification";

                        if ($result3=mysqli_query($conn,$sql3))
                          {
                          // Return the number of rows in result set
                          $rowcount = mysqli_num_rows($result3);
                          printf($rowcount);
                          // Free result set
                          mysqli_free_result($result3);
                          }
                    ?>
                </span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Notifications
                </h6>

                <?php 
                            // $query = "SELECT * FROM message LIMIT 3 ";
                            $query = "SELECT * FROM notification ORDER BY ID DESC LIMIT 3";

                            $result = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($result))
                            {                       
                        ?>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                                <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                <div class="text-truncate"><?php echo $row['notification'] ?></div>
                                <div class="small text-gray-500">Admin </div>
                                </div>
                            </a>
                            
                        </tbody>
                        <?php } ?>

                <a class="dropdown-item text-center small text-gray-500" href="notifications.php">Show All Notifications</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link" href="checkin.php" id="userDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Checkin</span>
                <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
              </a>
              
              <!-- Dropdown - User Information -->
              
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->