<div class="container">
    <div class="row justify-content-center gap-3">
        <div class="d-flex justify-content-center flex-wrap">
            @foreach ($projects as $project)
                <div class="card w-100 m-2 glass" style="width: 18rem;">
                    <div class="card-img-top-container d-flex align-items-center justify-content-center">
                        <img src="{{ $project->image }}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->name }}
                            @if ($project->type_id)
                                <span class="badge bg-secondary"><i
                                        class="{{ $types[$project->type_id - 1]->icon }} me-2"></i>{{ $types[$project->type_id - 1]->name }}</span>
                            @endif
                        </h5>
                        <p class="card-text">{{ $project->description }}</p>
                        <span class="badge rounded-pill text-bg-light">Tags</span>
                        <span class="badge rounded-pill text-bg-light">Tags</span>
                        <span class="badge rounded-pill text-bg-light">Tags</span>
                    </div>
                    <div class="d-flex align-items-center mb-3 ps-3 justify-self-end justify-content-center">
                        <a class="btn btn-primary me-3 add-cart-btn w-100 d-flex justify-content-center align-items-center"
                            href="{{ $project->url }}" target="_blank"><i class="fa-brands fa-github fs-2"></i>
                        </a>



                        @if (Route::getCurrentRoute()->uri == 'admin')
                            <a href="{{ route('admin.projects.edit', $project->id) }}"
                                class="btn btn-warning me-3 w-25 d-flex justify-content-center align-items-center"><i
                                    class="fa-solid fa-pen fs-5"></i></a>

                            <!-- Button trigger modal -->
                            <button type="button"
                                class="btn btn-danger me-3 w-25 d-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#{{ $project->id }}">
                                <i class="fa-solid fa-trash-can fs-5"></i>
                            </button>
                        @endif
                    </div>

                </div>
                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')


                    <!-- Modal -->
                    <div class="modal fade" id="{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content text-dark rounded-0">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="warningTitle">WARNING</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete {{ $project->name }}?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary rounded-0 fw-bold"
                                        data-bs-dismiss="modal">DISCARD</button>
                                    <input id="deleteBtn" class="btn btn-danger rounded-0 fw-bold" type="submit"
                                        value="DELETE">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>



    </div>
</div>
