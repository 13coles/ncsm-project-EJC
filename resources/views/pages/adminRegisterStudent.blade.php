@include('partials.header', ['title'=> 'Register Student'])
<link rel="stylesheet" href="public/css/student_table.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<x-adminHeader></x-adminHeader>
<x-adminSidebar></x-adminSidebar>
<main class="w-[86.6%] absolute top-40 left-64 p-10">
    <div class="flex justify-between items-center mb-2">
        <div >
            <h2 class="text-3xl font-black text-[#168753]">Registered Students</h2>
        </div>
     
        <form action="{{ route('search.registers') }}" method="POST" class="flex flex-row gap-x-2 mt-2">
            @csrf
            <input type="text" class="border border-solid border-black-600 w-56 h-11 rounded-md focus:outline-none px-2" name="search" placeholder="Search...">
            <button class="w-20 bg-[#168753] rounded-md text-white hover:bg-green-900" type="submit">Search</button>
        </form>
    </div>
    

    <section class="w-full mt-5 overflow-x-auto">
        <table class="w-full text-md table-auto border-collapse border border-gray-300">
            <thead class="bg-green-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="border border-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 text-center">
                    <th scope="col" class="px-3 py-3 uppercase border-b-2 border-gray-300">ID</th>
                    <th scope="col" class="px-3 py-3 uppercase border-b-2 border-gray-300">Students Name</th>
                    <th scope="col" class="px-6 py-3 uppercase border-b-2 border-gray-300">
                        <form action="{{ route('pages.adminRegisterStudent') }}" method="GET">
                            <select name="course" class="course-select form-select form-select-lg" style="font-size: 16px; color: #333;" onchange="this.form.submit()">
                                <option value="">Course</option>
                                @foreach ($uniqueCourses as $course)
                                    @php
                                        $courseFilterMatch = !$request->filled('course') || $course == $request->input('course');
                                        $noRecordsFound = $courseFilterMatch && $students->where('course', $course)->isEmpty();
                                    @endphp
                                    <option value="{{ $course }}" {{ request('course') == $course ? 'selected' : '' }}>
                                        {{ $course }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </th>
                    <th scope="col" class="px-6 py-3 uppercase border-b-2 border-gray-300">Contact Number</th>
                    <th scope="col" class="px-6 py-3 uppercase border-b-2 border-gray-300">Email</th>
                    <th scope="col" class="px-6 py-3 uppercase border-b-2 border-gray-300">
                        <form action="{{ route('pages.adminRegisterStudent') }}" method="GET">
                            <select name="status" class="status-select form-select form-select-lg" style="font-size: 16px; color: #333;" onchange="this.form.submit()">
                                <option value="">Status</option>
                                @foreach ($statusOptions as $status)
                                    @php
                                        $statusFilterMatch = !$request->filled('status') || $status == $request->input('status');
                                        $noRecordsFound = $statusFilterMatch && $students->where('status', $status)->isEmpty();
                                    @endphp
                                    <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                                        {{ $status }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </th>
                    <th scope="col" class="px-6 py-3 uppercase border-b-2 border-gray-300">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-800 dark:text-gray-100">
    
                @if ($noRecordsFound && $request->filled('status'))
                    <tr>
                        <td colspan="7" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                            <h2 class="text-red-500">No records found for status: {{ $request->input('status') }}</h2>
                        </td>
                    </tr>
                @endif
                @php
                    $showNoRecordsMessage = $students->isEmpty() && ($request->filled('course') || $request->filled('status'));
                @endphp
    
                @foreach ($students as $student)
                    @php
                        $courseFilterMatch = !$request->filled('course') || $student->course == $request->input('course');
                        $statusFilterMatch = !$request->filled('status') || $student->status == $request->input('status');
                    @endphp
    
                    @if ($courseFilterMatch && $statusFilterMatch)
                        <tr class="border-b border-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">
                            <td class="px-6 py-3 text-center">{{ $student->id }}</td>
                            <td class="px-6 py-3 text-left capitalize">
                                {{ $student->fname }}
                                @if ($student->mname)
                                    {{ $student->mname }}
                                @endif
                                {{ $student->lname }}
                                @if (!empty($student->sname))
                                    
                                @endif
                            </td>
                            <td class="px-6 py-3 text-left">{{ $student->course }}</td>
                            <td class="px-6 py-3 text-left">{{ $student->contact_number }}</td>
                            <td class="px-6 py-3 text-left">{{ $student->email }}</td>
                            <td class="px-6 py-3 text-center">
                                @if ($student->status == 'pending')
                                    <span class="badge bg-danger p-2 text-md">{{ $student->status }}</span>
                                @elseif ($student->status == 'approved')
                                    <span class="badge bg-success p-2 text-md">{{ $student->status }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-3 text-center">
                                <td>
                                    <button class="btn btn-primary view-btn" data-id="{{ $student->id }}">View</button>
                                </td>
                            </td>
                            
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        
        <!-- Pagination Links -->
        <div class="mt-5">
            <!-- Use Custom Pagination View -->
            {{ $students->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
        </div>
    </section>
    
    <!-- resources/views/students/modal.blade.php -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col"><h5 class="modal-title" id="updateModalLabel"></h5></div>
                        <div class="col"><p id="studentCourse"></p></div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Tab Links -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab" aria-controls="personal" aria-selected="true">Personal Information</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Address</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="parent-tab" data-bs-toggle="tab" data-bs-target="#parent" type="button" role="tab" aria-controls="parent" aria-selected="false">Parent/Guardian</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="classification-tab" data-bs-toggle="tab" data-bs-target="#classification" type="button" role="tab" aria-controls="classification" aria-selected="false">Classification</button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="myTabContent">
                        <!-- Personal Information -->
                        <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                            <table class="table-auto w-full bg-white px-10 py-5 shadow-md rounded-lg mt-5">
                                <thead>
                                    <tr class="bg-gray-200">
                                        <th class="px-4 py-2">Age</th>
                                        <th class="px-4 py-2">Birth Place</th>
                                        <th class="px-4 py-2">Nationality</th>
                                        <th class="px-4 py-2">Gender</th>
                                        <th class="px-4 py-2">Civil Status</th>
                                        <th class="px-4 py-2">Education</th>
                                        <th class="px-4 py-2">Employment</th>
                                    </tr>
                                </thead>
                                <tbody id="personal-info-body">
                                    <!-- Dynamic content will be added here -->
                                </tbody>
                            </table>
                        </div>

                        <!-- Address -->
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <table class="table-auto w-full bg-white px-10 py-5 shadow-md rounded-lg mt-5">
                                <thead>
                                    <tr class="bg-gray-200">
                                        <th class="px-4 py-2">Street Number</th>
                                        <th class="px-4 py-2">District</th>
                                        <th class="px-4 py-2">City/Municipality</th>
                                        <th class="px-4 py-2">Zip Code</th>
                                    </tr>
                                </thead>
                                <tbody id="address-info-body">
                                    <!-- Dynamic content will be added here -->
                                </tbody>
                            </table>
                        </div>

                        <!-- Parent/Guardian Information -->
                        <div class="tab-pane fade" id="parent" role="tabpanel" aria-labelledby="parent-tab">
                            <table class="table-auto w-full bg-white px-10 py-5 shadow-md rounded-lg mt-5">
                                <thead>
                                    <tr class="bg-gray-200">
                                        <th class="px-4 py-2">Full Name</th>
                                        <th class="px-4 py-2">Street Number</th>
                                        <th class="px-4 py-2">District</th>
                                        <th class="px-4 py-2">City/Municipality</th>
                                        <th class="px-4 py-2">Zip Code</th>
                                        <th class="px-4 py-2">Phone Number</th>
                                    </tr>
                                </thead>
                                <tbody id="parent-info-body">
                                    <!-- Dynamic content will be added here -->
                                </tbody>
                            </table>
                        </div>

                        <!-- Classification Information -->
                        <div class="tab-pane fade" id="classification" role="tabpanel" aria-labelledby="classification-tab">
                            <div class="mt-5 px-4">
                                <table class="table-auto w-full bg-white px-10 py-5 shadow-md rounded-lg mt-5">
                                    <thead>
                                        <tr class="bg-gray-200">
                                            <th class="px-4 py-2">Classification</th>
                                        </tr>
                                    </thead>
                                    <tbody id="classification-info-body">
                                        <!-- Dynamic content will be added here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Decline</button>
                    <button type="submit" class="btn btn-success">Approved</button>
                </div>
            </div>
        </div>
    </div>
</main>

{{-- <script>
    function clickRow(url) {
        window.location.href = url;
    }
</script> --}}
@include('partials.footer')
<script src="{{ asset('js/student-table.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>




