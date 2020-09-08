<!DOCTYPE html>
<html>
    
<head>
   <title>NIMR RESEARCH PROJECTS</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
        .citation{
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
 border-radius: 5px;*/
  box-shadow:1px 1px 2px #002633;
  border-left:4px solid #002633;
  padding: 5px 10px;
  margin-top: 15px;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}



.centre{
  margin-right: 40%;
}
    </style>
</head>

<body>

  <div class="container">

      
          
     <table class="table table-bordered table-striped" >
      
      <tr><th><center><b>RESEARCH PROJECTS DATABASE REPORT</b></center></th></tr>

             
       <tr> <th><center>REPORTS SHOW OVERALL  SUMMARY OF RESEARCH PROJECTS UPLOADED</center></th></tr> 
    <tr>
       <th><center>TITLES</center></th>
    </tr>
             

 
      @foreach ($project as $key => $item)
       <tr>
         <td>
             {{ ++$key }}.
      {{$item->title}}   
         </td>
       </tr>

           
 @endforeach
         
     </table> 
 
       </div>






</div>
</div>

</body>
</html>



