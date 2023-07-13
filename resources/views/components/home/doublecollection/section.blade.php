
<section class="py-0" id="collection">

    <div class="container">
        <div class="row h-100 gx-2">

            <x-home.doublecollection.card :collection="$collection[0]" />

            <x-home.doublecollection.card class="d-flex flex-column flex-end-center align-items-baseline h-100" 
                :collection="$collection[1]" />
        </div>
    </div>
    <!-- end of .container-->

</section>