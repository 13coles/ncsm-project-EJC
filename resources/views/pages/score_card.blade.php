@include('partials.header', ['title'=> 'Score Cards'])
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<x-adminHeader></x-adminHeader>
<x-adminSidebar></x-adminSidebar>
<div class="container main-content">
    <div class="container ms-5">
        <div class="container ms-5 p-5">
            <div class="container main-content mt-5">
                <div class="container-inside ms-5 justify-content-center">
                    <h1 class="text-center mb-4">Score Card</h1>
                    <div class="container m-5">
                        <div class="row justify-content-center p-3 ms-3">
                            @foreach($scoreCard as $card)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">{{ number_format($card->number_of_graduates) }}</h5>
                                        <p class="card-text text-center">Number of Graduates</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">{{ number_format($card->number_of_employed) }}</h5>
                                        <p class="card-text text-center">Number of Employed</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">{{ round($card->employment_rate) }}%</h5>
                                        <p class="card-text text-center">Employment Rate</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="d-flex justify-content-end mt-4">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal"
                                            data-bs-card-id="{{ $card->id }}"
                                            data-bs-number-of-graduates="{{ $card->number_of_graduates }}"
                                            data-bs-number-of-employed="{{ $card->number_of_employed }}">
                                            Edit
                                </button>
                            </div>
                            
                        </div>
                     
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Score Card</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update_score_card', ['id' => $card->id ?? '']) }}" method="POST" id="updatescoreCardForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="card_id" name="card_id" value="">
                    <div class="mb-3">
                        <label for="number_of_graduates" class="form-label">Number of Graduates</label>
                        <input type="number" class="form-control" id="number_of_graduates" name="number_of_graduates" placeholder="Enter # of graduates">
                    </div>
                    <div class="mb-3">
                        <label for="number_of_employed" class="form-label">Number of Employed</label>
                        <input type="number" class="form-control" id="number_of_employed" name="number_of_employed" placeholder="Enter # of employed">
                    </div>
                    <div class="mb-3">
                        <label for="employment_rate" class="form-label">Employment Rate (%)</label>
                        <input type="text" class="form-control" id="employment_rate" name="employment_rate" readonly>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Event listener for modal show
        var updateModal = document.getElementById('updateModal');
        updateModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var cardId = button.getAttribute('data-bs-card-id');
            var numberOfGraduates = button.getAttribute('data-bs-number-of-graduates');
            var numberOfEmployed = button.getAttribute('data-bs-number-of-employed');

            document.getElementById('card_id').value = cardId;
            document.getElementById('number_of_graduates').value = numberOfGraduates;
            document.getElementById('number_of_employed').value = numberOfEmployed;

            // Calculate employment rate
            var employmentRate = (numberOfEmployed / numberOfGraduates) * 100;
            document.getElementById('employment_rate').value = employmentRate.toFixed(2);
        });

        // Event listener for input changes to recalculate employment rate
        document.getElementById('number_of_graduates').addEventListener('input', calculateEmploymentRate);
        document.getElementById('number_of_employed').addEventListener('input', calculateEmploymentRate);

        function calculateEmploymentRate() {
            var graduates = document.getElementById('number_of_graduates').value;
            var employed = document.getElementById('number_of_employed').value;
            if (graduates > 0) {
                var employmentRate = (employed / graduates) * 100;
                document.getElementById('employment_rate').value = employmentRate.toFixed(2);
            } else {
                document.getElementById('employment_rate').value = '';
            }
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
@include('partials.footer')
