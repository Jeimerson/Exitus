<?php foreach ($this->view->listCourse as $i => $course) { ?>

    <form id="formCourse<?= $course->id_course ?>" class="card mb-4" action="">

        <div class="form-row d-flex align-items-center col-lg-11 mx-auto">

            <input type="hidden" name="idCourse" value="<?= $course->id_course ?>"">

        <div class=" col-lg-8 font-weight-bold">Curso Técnico de <?= $course->course ?>"
        </div>

        <div class="col-lg-4 d-flex justify-content-end mt-2">

            <span class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>
            <span class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>
            <span class="mr-2 delete-data-icon"><i class="fas fa-ban"></i></span>

        </div>

        </div>

        <div class="form-row mt-4 mb-2 col-lg-11 mx-auto">
            <div class="form-group col-lg-9">
                <label for="">Nome do curso:</label>
                <input class="form-control" disabled value="${data[i].course}" type="text" name="course" id="">
            </div>
            <div class="form-group col-lg-3">
                <label for="">Sigla:</label>
                <input class="form-control" disabled onkeyup="this.value = this.value.toUpperCase()" value="<?= $course->acronym ?>"" type=" text" name="acronym" id="">
            </div>


        </div>

    </form>

<?php } ?>