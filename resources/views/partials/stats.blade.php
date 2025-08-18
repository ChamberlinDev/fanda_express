 <div class="page-inner">
     <div
         class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
         <div>
             <h3 class="fw-bold mb-3">Tableau de bord</h3>
         </div>
         <!-- <div class="ms-md-auto py-2 py-md-0">
                            <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
                            <a href="#" class="btn btn-primary btn-round">Add Customer</a>
                        </div> -->
     </div>

 </div>
 <div class="row">
     <div class="col-sm-6 col-md-3">
         <div class="card card-stats card-round">
             <div class="card-body">
                 <div class="row align-items-center">
                     <div class="col-icon">
                         <div
                             class="icon-big text-center icon-primary bubble-shadow-small">
                             <i class="fas fa-users"></i>
                         </div>
                     </div>
                     <div class="col col-stats ms-3 ms-sm-0">
                         <div class="numbers">
                             <p class="card-category">Clients</p>
                             <h4 class="card-title">1,294</h4>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-sm-6 col-md-3">
         <div class="card card-stats card-round">
             <div class="card-body">
                 <div class="row align-items-center">
                     <div class="col-icon">
                         <div
                             class="icon-big text-center icon-info bubble-shadow-small">
                             <i class="fas fa-user-check"></i>
                         </div>
                     </div>
                     <div class="col col-stats ms-3 ms-sm-0">
                         <div class="numbers">
                             <p class="card-category">Reservations</p>
                             <h4 class="card-title">23</h4>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-sm-6 col-md-3">
         <div class="card card-stats card-round">
             <div class="card-body">
                 <div class="row align-items-center">
                     <div class="col-icon">
                         <div
                             class="icon-big text-center icon-success bubble-shadow-small">
                             <i class="fas fa-luggage-cart"></i>
                         </div>
                     </div>
                     <div class="col col-stats ms-3 ms-sm-0">
                         <div class="numbers">
                             <p class="card-category">Chambres</p>
                             <h4 class="card-title">22</h4>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-sm-6 col-md-3">
         <div class="card card-stats card-round">
             <div class="card-body">
                 <div class="row align-items-center">
                     <div class="col-icon">
                         <div
                             class="icon-big text-center icon-secondary bubble-shadow-small">
                             <i class="far fa-check-circle"></i>
                         </div>
                     </div>
                     <div class="col col-stats ms-3 ms-sm-0">
                         <div class="numbers">
                             <p class="card-category">Order</p>
                             <h4 class="card-title">52</h4>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <div class="row">
     <div class="card card-round">
         <div class="card-header">
             <div class="card-head-row card-tools-still-right">
                 <div class="card-title"><h4 class="text-center">Reservations recentes</h4></div>
                 <div class="card-tools">
                     <div class="dropdown">
                         <button
                             class="btn btn-icon btn-clean me-0"
                             type="button"
                             id="dropdownMenuButton"
                             data-bs-toggle="dropdown"
                             aria-haspopup="true"
                             aria-expanded="false">
                             <i class="fas fa-ellipsis-h"></i>
                         </button>
                         <div
                             class="dropdown-menu"
                             aria-labelledby="dropdownMenuButton">
                             <a class="dropdown-item" href="#">Telecharger</a>
                             <a class="dropdown-item" href="#"> Voir</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="card-body p-0">
             <div class="table-responsive">
                 <!-- Projects table -->
                 <table class="table align-items-center mb-0">
                     <thead class="thead-light">
                         <tr>
                             <th scope="col">Nom complet du client</th>
                             <th scope="col" class="text-end">Date & heure de reservation</th>
                             <th scope="col" class="text-end">email</th>
                             <th scope="col" class="text-end">Telophone</th>
                             <th scope="col" class="text-end">Status</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td scope="col">Yann chamberlin</td>
                             <td scope="col" class="text-end">19/07/2025, 12:45</td>
                             <td scope="col" class="text-end">yannnzaba@gmail.com</td>
                             <td scope="col" class="text-end">77 417 46 29</td>
                             <td scope="col" class="text-end">Encours</td>
                                
                         </tr>
                        
                         
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
 <div class="row">
     <div class="col-md-8">
         <div class="card card-round">
             <div class="card-header">
                 <div class="card-head-row">
                     <div class="card-title"> Mon etablissement</div>
                 </div>
             </div>
             <table class="table align-items-center mb-0">
                     <thead class="thead-light">
                         <tr>
                             <th class="text-dark">{{auth()->user()->nom_hotel}}</th>
                             <th><a href="/etablissement" class="btn btn-primary">Modifier</a></th>
                         </tr>
                     </thead>
                     <!-- <tbody>
                         <tr>
                             <td scope="col">Yann chamberlin</td>
                            
                                
                         </tr>
                        
                         
                     </tbody> -->
                 </table>
             
         </div>
     </div>
     <div class="col-md-4">
         <div class="card card-primary card-round">
             <div class="card-header">
                 <div class="card-head-row">
                     <div class="card-title">Gain genéré</div>
                 </div>
             </div>
             <div class="card-body pb-0">
                 <div class="mb-4 mt-2">
                     <h1>440000 FCFA</h1>
                 </div>
                 <div class="pull-in">
                     <canvas id="dailySalesChart"></canvas>
                 </div>
             </div>
         </div>
         
     </div>
 </div>