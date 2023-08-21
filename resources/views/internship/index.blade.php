<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
</x-slot>

    <x-app-layout>
    
    <style>
.card {
    display: block; 
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
    transition: box-shadow .25s; 
}
.card:hover {
  box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}
.img-card {
  width: 10%;
  height:10px;
  border-top-left-radius:2px;
  border-top-right-radius:2px;
  display:block;
  overflow: hidden;
}
.img-card img{
  width: 5%;
  height: 5px;
  object-fit:cover; 
  transition: all .25s ease;
}
</style>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <div class="container mt-4">
    @if(Session('success'))
    <div class="alert alert-success">
        {{Session('success')}}
</div>
    @endif
    @if(Session('fail'))
    <div class="alert alert-danger">
        {{Session('fail')}}
    </div>
    @endif
    <div class="row">
        @foreach($company as $comp)
        <div class="col-md-4 mb-4">
            <div class="card">
            <img src="{{asset('storage/images/'.$comp->image_url) }}" class="card-img-top img-medium" alt="Company Logo">
                <div class="card-body">
                    
                    <div class='comp-form d-flex flex-column gap-3'>
                        <div class='d-flex gap-2'>
                            <label for='comp_nm'>Company Name:</label>
                            <input type='text' id='comp_nm' class='form-control border-0' disabled data-name='company_name' value="{{$comp->company_name}}"/>
                        </div>
                        <div class='d-flex gap-2'>
                            <label for='comp_pos'>Position: </label>
                            <input type='text' id='comp_pos' class='form-control border-0' disabled data-name='position' value="{{$comp->position}}"/>
                        </div>
                        <div class='d-flex gap-2'>
                            <label for='comp_job'>Job type: </label>
                            <input type='text' id='comp_job' class='form-control border-0' disabled data-name='job_type' value="{{$comp->job_type}}"/>
                        </div>
                        <div class='d-flex gap-2'>
                            <label for='comp_des'>Description: </label>
                            <input type='text' id='comp_des' class='form-control border-0' disabled data-name='description' value="{{$comp->description}}"/>
                        </div>
                        <div class='d-flex gap-2'>
                            <label for='comp_str'>Start date: </label>
                            <input type='date' id='comp_str' class='form-control border-0' disabled data-name='start_date' value="{{$comp->start_date}}"/>
                        </div>
                        <div class='d-flex gap-2'>
                            <label for='comp_end'>End date: </label>
                            <input type='date' id='comp_end' class='form-control border-0' disabled data-name='end_date' value="{{$comp->end_date}}"/>
                        </div>
                        <div class='d-flex gap-2'>
                            <label for='comp_loc'>Location: </label>
                            <input type='text' id='comp_loc' class='form-control border-0' disabled data-name='location' value="{{$comp->location}}"/>
                        </div>
                        <div class='d-flex gap-2'>
                            <label for='comp_cat'>Category: </label>
                            <input type='text' id='comp_cat' class='form-control border-0' disabled data-name='category' value="{{$comp->category}}"/>
                        </div>
                        <div class='d-flex gap-2'>
                            <label for='comp_app'>Application Deadline: </label>
                            <input type='date' id='comp_app' class='form-control border-0' disabled data-name='application_deadline' value="{{$comp->application_deadline}}"/>
                        </div>
                        <button type="button" onclick="DeleteCompany({{$comp->id}})" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        <button type="button" class="editBtn btn btn-primary ml-2" data-id='{{$comp->id}}'><i class="fa fa-edit"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</x-app-layout>
<script>

    $(document).ready(function(){
        $('.editBtn').on('click',function(){
            // e.preventDefault()
            let data = [], comp_id = $(this).attr('data-id'), compObject={}

            let inputs = $(this).parent().find('input')

            if($(this).hasClass('active')){
                inputs.addClass('border-0')
                $(this).html('Edit')
                $(this).removeClass('active')

                inputs.each(function(key,val){
                    let THIS_KEY = $(this).attr('data-name'), THIS_VAL = $(this).val()
                    compObject[THIS_KEY] = THIS_VAL
                })
                data.push(compObject)
    
                console.log(data);
    
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('internship.edit')}}",
                    type: 'POST',
                    data: {'id':comp_id,'data':data},
                    success: function(response){
                        if(response == 'success'){
                            location.href='{{route("internship.store")}}'
                        }else{
                            alert('We can\'t update at the moment try later.')
                            console.log('Post Error',response);
                        }
                    }
                })

            }else{
                inputs.prop('disabled',false)
                inputs.removeClass('border-0')
                $(this).html('Submit')
                $(this).addClass('active')
            }

        })
    })

</script>
<script>
    function DeleteCompany(id){
        let val = id
        window.location.href= `/dashboard/internship/delete/${id}`
    }
</script>