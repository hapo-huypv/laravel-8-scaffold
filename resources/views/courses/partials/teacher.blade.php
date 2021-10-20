<div class="show-detail-course">
    <div class="tab-title">Main Teacher</div>
    @foreach ($courseTeachers as $courseTeacher)
        <div class="d-flex align-items-center">
            <img src="{{ asset('assets/img/avatar_nghialt.png') }}" alt="teacher">
            <div class="ml-3">
                <div class="teacher-name">{{ $courseTeacher->name }}</div>
                <div class="teacher-role">Second Year Teacher</div>
                <div class="d-flex">
                    <i class="d-flex justify-content-center align-items-center mr-1 fab fa-google-plus-g"></i>
                    <i class="d-flex justify-content-center align-items-center fab fa-facebook-f"></i>
                </div>
            </div>
        </div>
        <div class="teacher-intro">Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum. Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique </div>
    @endforeach
</div>