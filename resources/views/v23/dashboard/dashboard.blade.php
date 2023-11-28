
<!-- ROW-1 -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
        <div class="row">
            @if (Auth::user()->role == "db" || Auth::user()->role == "admin")
                <div class="col-md-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Total Users</h6>
                                    <h2 class="mb-0 number-font">{{ $users }}</h2>
                                </div>
                                <div class="ms-auto">
                                    <div class="mt-1">
                                        <i style="font-size: 25px" class="fe fe-users"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="text-muted fs-12"><span class="text-secondary"><i class="fe fe-arrow-up-circle  text-secondary"></i> {{ $usersLast7Days }} </span>Last week</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Reg Members</h6>
                                    <h2 class="mb-0 number-font">{{ $members }}</h2>
                                </div>
                                <div class="ms-auto">
                                    <div class="mt-1">
                                        <i style="font-size: 25px" class="fe fe-users"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="text-muted fs-12"><span class="text-secondary"><i class="fe fe-arrow-up-circle  text-secondary"></i> {{ $membersLast7Days }} </span>Last week</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Admins</h6>
                                    <h2 class="mb-0 number-font">{{ $admins }}</h2>
                                </div>
                                <div class="ms-auto">
                                    <div class="mt-1">
                                        <i style="font-size: 25px" class="fe fe-users"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="text-muted fs-12"><span class="text-secondary"><i class="fe fe-arrow-up-circle  text-secondary"></i> {{ $adminsLast7Days }} </span>Last week</span>
                        </div>
                    </div>
                </div>
            @endif

            @if (Auth::user()->role == "ict" || Auth::user()->role == "admin")
                <div class="col-md-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Books</h6>
                                    <h2 class="mb-0 number-font">{{ $books }}</h2>
                                </div>
                                <div class="ms-auto">
                                    <div class="mt-1">
                                        <i style="font-size: 25px" class="fe fe-book-open"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="text-muted fs-12"><span class="text-secondary"><i class="fe fe-arrow-up-circle  text-secondary"></i> {{ $booksLast7Days }} </span>Last week</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Video</h6>
                                    <h2 class="mb-0 number-font">{{ $videos }}</h2>
                                </div>
                                <div class="ms-auto">
                                    <div class="mt-1">
                                        <i style="font-size: 25px" class="fe fe-film"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="text-muted fs-12"><span class="text-secondary"><i class="fe fe-arrow-up-circle  text-secondary"></i> {{ $videosLast7Days }} </span>Last week</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Music(Podcast)</h6>
                                    <h2 class="mb-0 number-font">{{ $audios }}</h2>
                                </div>
                                <div class="ms-auto">
                                    <div class="mt-1">
                                        <i style="font-size: 25px" class="fe fe-music"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="text-muted fs-12"><span class="text-secondary"><i class="fe fe-arrow-up-circle  text-secondary"></i> {{ $audiosLast7Days }} </span>Last week</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Gallery</h6>
                                    <h2 class="mb-0 number-font">{{ $images }}</h2>
                                </div>
                                <div class="ms-auto">
                                    <div class="mt-1">
                                        <i style="font-size: 25px" class="fe fe-image"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="text-muted fs-12"><span class="text-secondary"><i class="fe fe-arrow-up-circle  text-secondary"></i> {{ $imagesLast7Days }} </span>Last week</span>
                        </div>
                    </div>
                </div>
            @endif


            {{-- <div class="col-md-6 col-md-6 col-sm-12 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">Reported</h6>
                                <h2 class="mb-0 number-font">{{ $reports }}</h2>
                            </div>
                            <div class="ms-auto">
                                <div class="mt-1">
                                    <i style="font-size: 25px" class="fe fe-x-circle"></i>
                                </div>
                            </div>
                        </div>
                        <span class="text-muted fs-12"><span class="text-secondary"><i class="fe fe-arrow-up-circle  text-secondary"></i> {{ $reportsLast7Days }} </span>Last week</span>
                    </div>
                </div>
            </div> --}}


        </div>
    </div>
</div>
<!-- ROW-1 END -->
