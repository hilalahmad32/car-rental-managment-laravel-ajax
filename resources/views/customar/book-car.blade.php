<x-layouts>
    <x-slot name="title">book-car</x-slot>
    <x-slot name="content">
        <div class="container my-5">
           <div class="row">
<div class="col-lg-3 col-md-12 col-sm-12">

             @include('../customar/include/sidebar');
</div>
               <div class="col-lg-8 col-md-12 col-sm-12">
                   <div class="card">
                       <div class="card-header">
                           <h3>Book Car List</h3>
                       </div>
                       <div class="card-body">
                           <div id="get-book-car"></div>
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </x-slot>
</x-layouts>