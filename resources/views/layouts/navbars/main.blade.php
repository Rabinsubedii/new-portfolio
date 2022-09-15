 <nav class="navbar navbar-expand-lg navbar-light">
     @foreach ($setting as $item)
         <a class="navbar-brand" href="#"><img src="{{ asset('uploads/logo/' . $item->logo) }}" alt=""></a>
     @endforeach

     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
     </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
             <li class="nav-item">
                 <a class="nav-link" href="/">Home</a>
             </li>

             <li class="nav-item">
                 <a class="nav-link" href="#service">Service</a>
             </li>

             <li class="nav-item">
                 <a class="nav-link" href="#client">About</a>
             </li>

             <li class="nav-item">
                 <a class="nav-link" href="#work">Work</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#contact">Contact</a>
             </li>
         </ul>
         @foreach ($cv as $item)
             <a href="{{ asset('uploads/cv/' . $item->cv) }}" class="btn download-cv">Download CV</a>
         @endforeach

     </div>
 </nav>
