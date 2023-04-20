<div class="row">
  <div class="col-md-12">
     <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Prenoms</th>
                  <th scope="col">Email</th>
                  <th scope="col">Roles</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->firstname}}</td>
                    <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                    <!--Récuperer les données sous forme de tableau-->
                    <td>{{implode(',',$user->roles()->get()->pluck('name')->toArray())}}</td>
                    <td>
                      <!--Gates edit-users--->
                      
                            <a href="{{route('admin.edit',$user)}}"><button class="btn btn-primary"><i class="fa fa-edit"></i> Editer</button></a>
                      
                       <!--Gates delete-users--->
                      
                          <form 
                           action=""
                           method="POST"
                           class="d-inline"
                           onsubmit ="return confirm('Etre vous sur de vouloir supprimer cet utilisateur?');"
                          >
                            @csrf
                            @method('DELETE')
                            <a href=""><button class="btn btn-warning"><i class="fa fa-trash"></i> Supprimer</button></a>
                       </form>
                   </td>
                </tr>
             @endforeach
             </tbody>
        </table>
  </div>
</div>