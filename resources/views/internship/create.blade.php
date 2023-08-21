<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta value='{{old("viewport")}}' name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<x-app-layout>
<div class="mb-3">
</div>
<!-- <div class="hidden sm:flex sm:items-center sm:ml-6">
    <a href="{{ route('internship.index') }}" class="btn btn-secondary">Back</a>
</div> -->
  

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('internship.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                            <label for="image">Company Logo:</label>
                            <input type="file" name="image" id="image" class="form-control border-0" accept="image/*">
                            <!-- <input type="file" class="form-control" id="image" name="image"> -->
                            <span style="color: red">@error('image') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="company_name">Company Name:</label>
                                <input type="text" class="form-control" id="company_name" value='{{old("company_name")}}' name="company_name" placeholder="Enter your company name" >
                                <span style='color:red'>@error('company_name') {{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="position">Position:</label>
                                <input type="text" class="form-control" id="position" value='{{old("position")}}' name="position" placeholder="Enter the position">
                                <span style='color:red'>@error('position') {{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <!-- <textarea name="description" rows="5" cols="40"></textarea> -->
                                <textarea class="form-control" id="description" value='{{old("description")}}' name="description" rows="5" cols="40" placeholder="Enter your description"></textarea>
                                <span style='color:red'>@error('description') {{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                            <select class="form-control" id="job_type" name="job_type">
                            <option value="full-time" {{old("job_type") == 'full-time'? 'selected' : null}}>Full-Time</option>
                            <option value="part-time" {{old("job_type") == 'part-time'? 'selected' : null}}>Part-Time</option>
                            <option value="internship" {{old("job_type") == 'internship'? 'selected' : null}}>Internship</option>
                            <option value="contract" {{old("job_type") == 'contract'? 'selected' : null}}>contract</option>
                            </select>
                            <span style='color:red'>@error('job_type') {{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start Date:</label>
                                <input type="date" class="form-control" id="start_date" value='{{old("start_date")}}' name="start_date">
                                <span style='color:red'>@error('start_date') {{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date:</label>
                                <input type="date" class="form-control" id="end_date" value='{{old("end_date")}}' name="end_date">
                                <span style='color:red'>@error('end_date') {{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="location">Location:</label>
                                <input type="text" class="form-control" id="location" value='{{old("location")}}' name="location" placeholder="Enter the location">
                                <span style='color:red'>@error('location') {{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                            <select class="form-control" id="category" name="category">
                            <option value="Technology" {{old("category") == 'Technology'? 'selected' : null}}>Technology</option>
                            <option value="Engineering" {{old("category") == 'Engineering'? 'selected' : null}}>Engineering</option>
                            <option value="Business" {{old("category") == 'Business'? 'selected' : null}}>Business</option>
                            <option value="Law" {{old("category") == 'Law'? 'selected' : null}}>Law</option>
                            </select>
                            <span style='color:red'>@error('job_type') {{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="application_deadline">Application Deadline:</label>
                                <input type="date" class="form-control" id="application_deadline" value='{{old("application_deadline")}}' name="application_deadline">
                                <span style='color:red'>@error('application_deadline') {{$message}} @enderror</span>
                            </div>
                            <style>
                                .btn{
                                    background-color:blue;
                                }
                            </style>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
</html>
