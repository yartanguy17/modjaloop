 <!-- Sidebar  -->
 <div class="iq-sidebar">
            <div class="iq-navbar-logo d-flex justify-content-between">
               <a href="index.html" class="header-logo">
               <img src="images/logo.png" class="img-fluid rounded" alt="">
               <span>Modjaloop</span>
               </a>
               <div class="iq-menu-bt align-self-center">
                  <div class="wrapper-menu">
                     <div class="main-circle"><i class="ri-menu-line"></i></div>
                     <div class="hover-circle"><i class="ri-close-fill"></i></div>
                  </div>
               </div>
            </div>
            <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                     <li class="active">
                        <a href="#dashboard" class="iq-waves-effect" data-toggle="collapse" aria-expanded="true"><span class="ripple rippleEffect"></span><i class="las la-home iq-arrow-left"></i><span>Dashboard</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="dashboard" class="iq-submenu collapse show" data-parent="#iq-sidebar-toggle">
                           <li class="active"><a href="index.html"><i class="las la-laptop-code"></i>Account Dashboard</a></li>
                           <li><a href="dashboard-1.html"><i class="las la-ad"></i>Marketing Dashboard</a></li>
                
                        </ul>
                     </li>

            

                     <li>
                        <a href="{{ route('app.users.get') }}" class="iq-waves-effect">
                            <i class="las la-calendar iq-arrow-left"></i><span>Utilisateurs</span>
                        </a>
                     </li>
                     <li>
                        <a href="{{ route('app.dfsp.get') }}" class="iq-waves-effect">
                            <i class="las la-calendar iq-arrow-left"></i><span>Dfsp</span>
                        </a>
                     </li>

                     <li>
                        <a href="{{ route('app.ledger.get') }}" class="iq-waves-effect">
                            <i class="las la-calendar iq-arrow-left"></i><span>Ledger</span>
                        </a>
                     </li>
                     <li>
                        <a href="{{ route('app.bank.get') }}" class="iq-waves-effect">
                            <i class="las la-calendar iq-arrow-left"></i><span>Banques</span>
                        </a>
                     </li>
                     <li>
                        <a href="{{ route('app.account.get') }}" class="iq-waves-effect">
                            <i class="las la-calendar iq-arrow-left"></i><span>Comptes</span>
                        </a>
                     </li>
                     <li>
                        <a href="{{ route('app.transaction.get') }}" class="iq-waves-effect">
                            <i class="las la-calendar iq-arrow-left"></i><span>Transactions</span>
                        </a>
                     </li>

                  </ul>
               </nav>
               <div class="p-3"></div>
            </div>
         </div>