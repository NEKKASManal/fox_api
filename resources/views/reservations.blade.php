<?php
    
    //dd($resa);

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <title>RESERVATION</title>
    
</head>
<body>
   <div class="container-fluid">
      <div class="row">
        <div class="col-12"> 
           {{-- <table class=" table-striped table-inverse table-responsive"></table> --}}
            <table class="table table-striped table-inverse">
             <h4>INFOS AGENCE</h4>
            <thead class="thead-dark">
               <tr>
                  <th>NOM AGENCE</th>
                  <th>CODE AGENCE</th>
               </tr>
            </thead>
               <tbody>
               @foreach ($resa as $r)
               <tr>
               <td>{{ $r->nomagence }}</td>
               <td>{{ $r->codeagence }}</td>
               </tr>  
               @endforeach
               </tbody>
            </table>
        </div>
      </div>
   </div>    
</body>
</html>