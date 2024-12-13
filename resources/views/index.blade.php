<!DOCTYPE html>
<html>
<body>



<form action="{{url('submit')}}" method="POST" enctype="multipart/form-data">
    @csrf
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="email">email:</label><br>
  <input type="email" id="email" name="email"><br>
  <label for="int">Mobile Number:</label><br>
  <input type="number" id="number" name="number"><br><br>
  <label for="num">DOB:</label><br>
  <input type="date" id="dob" name="dob"><br><br>
  <label for="img">iMAGE:</label><br>
  <input type="file" id="img" name="img"><br><br>
  <input type="submit" value="Submit">

  
<table style=" border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>NUMBER</th>
        <th>DOB</th>
        <th>Image</th>
         <th>Action</th> 
    </tr>
   
    @foreach ($employee as $Employees)

<tr>
  
    <td>{{$Employees->id}}</td>
    <td>{{$Employees->name}}</td>
    <td>{{$Employees->email}}</td>
    <td>{{$Employees->number}}</td>
    <td>{{$Employees->dob}}</td>
    
          
    
    <td><img src="{{asset('uploads/'.$Employees->img)  }}" style="height:100px"></td>
    {{-- <td>
                <a href="{{url('index')}}">Update</a>
            </td> --}}
            {{-- <td>
                <form action="{{ route('employee.destroy', $Employees->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?');">
                        Delete
                    </button>
                </form>
            </td> --}}
            <td>
                <div class="d-flex">
                    <a href="{{url('update-employee?id='.$Employees->id)}}" onclick="warning('Do you want to edit?')" class="text-success">Update</a>
                    <a href="{{url('delete-employee?id='.$Employees->id)}}" onclick="warning(,'Do you want to delete?')" class="text-danger">Delete</a>
                </div>
            </td>
        
   
</tr>

   @endforeach

</table>
</form> 
@if(session('success'))
<script>
   Swal.fire({
   title: "Success!",
   text: "{{session('success')}}",
   icon: "success"
   });
</script>
@endif

</body>
</html>
