@extends('layouts.master')


@section('title')

    Dashbord admin!

@endsection()

@section('content')

   <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text">
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <td>
                          <button id='addd' class="btn btn-outline-primary">add user</button>
                      </td>
                    </thead>  
                    <thead class=" text">
                      <th>ID</th>
                      <th>Name</th>
                      <th>E-mail</th>
                      <th>Accepte</th>
                      <th>Role</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </thead>
                    <tbody>   
                        @foreach ($all as $one)
             
                        <tr>
                            <td>{{$one->id}}</td>
                            <td>{{$one->name}}</td>
                            <td>{{$one->email}}</td>
                            @if($one->approve == 1)
                            <td><span class="btn-outline-info">YES</span></td>
                            @else
                            <td><span class="btn-outline-danger">NO</span></td>
                            @endif 

                            @if ($one->role == 1)
                               <td> admin </td>
                             @else    
                               <td>menbre</td>
                            @endif
                            <td><a href="/Edit-role/{{ $one->id }}" class='btn btn-teal'>Edit</a></td>
                            <td>
                            @if ($one->role ==1)
                              <button disabled class='btn btn-danger'>Delete</button>
                            @else 
                            <button onclick="getId(this)" data-id="{{$one->id}}" data-toggle="modal" data-target="#delete" type="submit" class='btn btn-danger'>Delete</button>
                            @endif
                                {{-- <input type="hidden" value="{{$one->id}}" id="hidden"> --}}
                                {{--                              
                                 <form id='delete' action="/delete-form/{{$one->id}}" method="post">
                                    
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    
                                </form> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

<!-- Modal -->
 <!-- Button trigger modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
 are you sure to delete this user ?
</div>
<div class="modal-footer">
<button type="button" id="yes" class="btn btn-secondary" data-dismiss="modal">yes</button>
<button type="button" id='hide' class="btn btn-primary">no</button>
</div>
</div>
</div>
</div>




@endsection()

@section('scripts')
 <script>

 function getId(data){
        
    $('#delete').modal('show');

    const token  = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); 

    const id = data.getAttribute("data-id");

    $("#yes").on("click", function(){

        fetch(`/delete-form/${id}`,{
            headers:{
                "X-Requested-with":"XMLHttpRequest",
                "X-CSRF-TOKEN":token
            },
            method:'delete'

        }).then(data =>{
            location.reload();
            //location.href = '/all-menbre-role';
        }).catch(er=>console.log(er));

    });


}

$('#hide').on("click", function(){    
      $('#delete').modal('hide');    
 });


$("#addd").on('click',function(){
    window.location.href = '/add-new-user';    
})

</script>
@endsection()
       