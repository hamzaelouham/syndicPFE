@extends('layouts.master')


@section('title')

    Dashbord admin!

@endsection()

@section('content')
    <div class="row justify-content-center"> 
    <div class="col-md-9">
    <div class="card">
        <div class="card-body">

            <h5 class="text-center">Add new user</h5>

            <form methode="post">
                <div class="col-md-6 offset-md-3">    
                  <div class="form-group text-center" >
                  <label  for="name">Name</label>
                  <input id="name" class="form-control" type="text" name="name">
                  </div>
                </div>

                 <div class="col-md-6 offset-md-3">    
                  <div class="form-group text-center" >
                  <label  for="email">E-mail</label>
                  <input id="email"  class="form-control" type="text" name="email">
                  </div>
                </div>
                
                 <div class="col-md-6 offset-md-3">    
                    <div class="form-group text-center" >
                    <select id="role"  class="form-select form-select-lg mb-5">
                            <option value="1">admin</option>
                            <option value="2">menbre</option>    
                    </select>
                    </div>
                </div>
            
                <div class="row justify-content-center">
                  <div class="col-2">
                      <button  type="submit" class="btn btn-info">Add</button>
                  </div>
                          
                 <div class="col-2">
                   <a href="/all-menbre-role" id='cancel' class="btn btn-danger">cancel</a> 
                </div>
                </div>
            </div>
            </form>          
        </div>
        </div>


        </div>
    
    </div>

@endsection()

@section('scripts')
 <script>


    $("#addd").on('click',function(){
        
        window.location.href = '/add-new-user';     
    });

$("form").on("submit", function(e){
    e.preventDefault();
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); 
   
    const data = {
        name:$("#name").val(),
        email:$("#email").val(),
        role:$("#role").val()
    };

    fetch('/add-new-user/add',{
            headers:{
                "X-Requested-with":"XMLHttpRequest",
                "X-CSRF-TOKEN":token,
                'Content-Type':'application/json',
                'Accept':'application/json'
            },

            method:'POST',
            
            body: JSON.stringify(data)

        }).then(data =>{
            console.log(data);
         if(!data.ok)
         {
            Swal.fire({
            title: 'Error!',
            icon: 'error',
            confirmButtonText: 'ok'
            })
         }
         else
         {
           
            Swal.fire({
            title: 'user added with success',
            icon: 'success',
            confirmButtonText: 'ok' 
            }) 

         }
        
        }).catch(er=>{
        
        
        });

 

});


</script>
@endsection()







































