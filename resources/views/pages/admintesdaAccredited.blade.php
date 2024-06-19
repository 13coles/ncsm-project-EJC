@include('partials.header', ['title' => 'TESDA QUALIFICATIONS'])

<!-- Link your CSS file -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<x-adminHeader></x-adminHeader>
<x-adminSidebar></x-adminSidebar>
<main class="w-[86.6%] absolute top-40 left-64 p-10">
    <div class="container main-content">
        <div class="ms-5 p-5">
            <h1 class="text-center mb-4">TESDA Accredited Competency Assessment Center</h1>
            <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Add New </button>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Qualification</th>
                        <th>Assessment Fee</th>
                        <th>No. of Assessment Hours</th>
                        <th>Total No. of Candidates per Assessment/Batch</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($programs as $program)
                    <tr>
                        <td>{{ $program->name }}</td>
                        <td>Php {{ number_format($program->assessment_fee, 2) }}</td>
                        <td>{{ $program->hours }}</td>
                        <td>
                            @php
                                $studentCount = $studentCounts->get($program->name, 'N/A');
                            @endphp
                            {{ $studentCount }}
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal"
                            data-bs-program-id="{{ $program->id }}"
                            data-bs-name="{{ $program->name}}"
                            data-bs-assessment_fee="{{ $program->assessment_fee }}"
                            data-bs-hours="{{ $program->hours }}">
                            Edit
                </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add New Tesda Accredited</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for adding new -->
                    <form action="" method="POST" id="addModalForm">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Qualifications</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Qualification name">
                        </div>
                        <div class="mb-3">
                            <label for="assessment_fee" class="form-label">Assessment Fee</label>
                            <input type="text" class="form-control" id="assessment_fee" name="assessment_fee"placeholder="Enter assessment fee">
                        </div>
                        <div class="mb-3">
                            <label for="hours" class="form-label">No. of Assessment Hours</label>
                            <input type="text" class="form-control" id="hours" name="hours" placeholder="Enter assessment hours">
                        </div>
                     
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    {{-- update --}}
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Edit Tesda Accredited</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for updating -->
                    <form action="{{ route('update_tesda_accredited', ['id' => $program->id ?? '']) }}" method="POST" id="updatetesdaAccreditedForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="program_id" name="program_id" value="">
                        <div class="mb-3">
                            <label for="name" class="form-label">Qualifications</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Qualification name" value="{{ old('name', $program->name) }}">
                        </div>
                        <div class="mb-3">
                            <label for="assessment_fee" class="form-label">Assessment Fee</label>
                            <input type="text" class="form-control" id="assessment_fee" name="assessment_fee" placeholder="Enter assessment fee" value="{{ old('assessment_fee', $program->assessment_fee) }}">
                        </div>
                        <div class="mb-3">
                            <label for="hours" class="form-label">No. of Assessment Hours</label>
                            <input type="text" class="form-control" id="hours" name="hours" placeholder="Enter assessment hours" value="{{ old('hours', $program->hours) }}">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="updatetesdaAccreditedForm" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
    
    
</main>


@include('partials.footer')

<!-- Link your JavaScript file -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
