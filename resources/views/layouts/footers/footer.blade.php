<footer>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="footer-title">
                    <h3> let's make something
                        amazing together.</h3>
                    <p>Start by <span class="span-footer">saying hey!</span></p>
                </div>
            </div>

            <div class="col">
                <div class="other-link-title">
                    Other's Link

                    <div class="link">
                        <ul>
                            <li class="nav-link footer-nav-link"><a href="">Home</a></li>
                            <li class="nav-link footer-nav-link"><a href="#client">About</a></li>
                            @foreach ($cv as $item)
                                <li class="nav-link footer-nav-link"><a
                                        href="{{ asset('uploads/cv/' . $item->cv) }}">Download CV</a></li>
                            @endforeach

                            <li class="nav-link footer-nav-link"><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright">
            @foreach ($setting as $item)
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-logo">
                            <img src="{{ asset('uploads/logo/' . $item->logo) }}" class="footer-logo" alt="Footer Icon">
                        </div>
                    </div>

                    <div class="col-md-4">

                        <div class="copyright-info">
                            <p>{{ $item->copyrightinfo }} </p>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="design-info">
                            <p>Design By <span class="design-name">Rabin Subedi</span></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



</footer>
