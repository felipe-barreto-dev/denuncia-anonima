<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
     <title>Histórico de Denúncias</title>


     <style>
          body{
               background-color: #17A2B8;
          }

          .header {
          position: relative;
          display: flex;
          align-items: center; /* Centraliza verticalmente */
          justify-content: space-between;
          padding: 25px;
          height: 20vh;
          }

          .header img {
          width: 200px;
          margin: 0 auto; /* Centraliza horizontalmente */
          }

          .header button {
          /* position: absolute; */
          /* right: 15px; */
          /* top: 70px; */
          }

          .nav-table {
          /* position: absolute; */
          /* bottom: 0; */
          }

          .table-container{
               background-color: white;
               border-radius: 30px 30px 0 0;
               border: solid 1px;
               padding: 50px;
               height: 80vh;
          }


     </style>
</head>
<body>

     
          <!-- header -->
          <div class="header">

                <!-- navegação -->
               <div class="nav-table bg-light">
                    <ul class="nav nav-tabs">
                         <li class="nav-item">
                         <a class="nav-link active" aria-current="page" href="#">Active</a>
                         </li>
                         <li class="nav-item">
                         <a class="nav-link" href="#">Link</a>
                         </li>
                         <li class="nav-item">
                         <a class="nav-link" href="#">Link</a>
                         </li>
                         <li class="nav-item">
                         <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                         </li>
                    </ul>
               </div>

          

          <div><img src="logo-branca.png" alt="">   
          </div>

          <div><button type="button" class="btn btn-secondary btn-lg">Nova denúncia</button>
          </div>

          
          </div>

          

          <!-- tabela  -->
          <div class="table-container">
               <table class="table table-light table-striped">
                    <thead>
                    
                    </thead>
                    <tbody>
                    <tr>
                    <td><h5>titulo</h5>
                         <p>subtitle</p>
                         </td>

                         <td>
                              <button type="button" class="btn btn-primary btn-sm">Small button</button>
                         </td>
                    </tr>

     
                    </tbody>
               </table>


               <nav aria-label="Page navigation example">
                         <ul class="pagination">
                         <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                         <li class="page-item"><a class="page-link" href="#">1</a></li>
                         <li class="page-item"><a class="page-link" href="#">2</a></li>
                         <li class="page-item"><a class="page-link" href="#">3</a></li>
                         <li class="page-item"><a class="page-link" href="#">Next</a></li>
                         </ul>
                    </nav>
          </div>

     </div>
    
     
     
</body>
</html>