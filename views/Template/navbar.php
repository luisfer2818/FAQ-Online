  <!-- Page Content Holder -->
  <div id="content">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" id="sidebarCollapse" class="btn btn-dark navbar-btn">
                   <i class="fa fa-arrow-left" aria-hidden="true"></i>
                   <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a id="sair" href="../controller/logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- BEM-VINDO -->
    <p id="bem-vindo">
    <i class="fa fa-hand-peace-o" aria-hidden="true"></i> Seja Bem-Vindo(a) 
    <?php echo $_SESSION['user']['nome']; ?></p>