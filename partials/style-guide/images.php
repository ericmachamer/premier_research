<!-- Forms
        ================================================== -->
<div id="images" class="bs-docs-section">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h1>Images</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2>Responsive images</h2>
            <p>Images in Bootstrap are made responsive with <code class="highlighter-rouge">.img-fluid</code>. <code class="highlighter-rouge">max-width: 100%;</code> and <code class="highlighter-rouge">height: auto;</code> are applied to the image so that it scales with the parent element.</p>
            <div class="bs-component">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <img src="https://via.placeholder.com/350x250?text=100%x250" class="img-fluid" alt="100%x250" style="height: 250px; width: 100%; display: block;" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="bd-callout bd-callout-warning">
                <h5 id="svg-images-and-ie-10">SVG images and IE 10</h5>
                <p>In Internet Explorer 10, SVG images with <code class="highlighter-rouge">.img-fluid</code> are disproportionately sized. To fix this, add <code class="highlighter-rouge">width: 100% \9;</code> where necessary. This fix improperly sizes other image formats, so Bootstrap doesn’t apply it automatically.</p>
            </div>
            <h2>Image thumbnails</h2>
            <p>In addition to our <a href="/docs/4.1/utilities/borders/">border-radius utilities</a>, you can use <code class="highlighter-rouge">.img-thumbnail</code> to give an image a rounded 1px border appearance.</p>
            <div class="bs-component">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <img src="https://via.placeholder.com/200x200" class="img-thumbnail" alt="200x200"">
                        </div>
                    </div>
                </div>
            </div>
            <h2>Aligning images</h2>
            <p>Align images with the helper float classes or text alignment classes. <code class="highlighter-rouge">block</code>-level images can be centered using the .mx-auto margin utility class.</p>
            <div class="bs-component">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <img src="https://via.placeholder.com/200x200" class="rounded float-left" alt="200x200">
                            <img src="https://via.placeholder.com/200x200" class="rounded float-right" alt="200x200">
                        </div>
                    </div>
                </div>
            </div>
            <div class="bs-component">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <img src="https://via.placeholder.com/200x200" class="rounded mx-auto d-block" alt="200x200">
                        </div>
                    </div>
                </div>
            </div>
            <h2>Picture</h2>
            <p>If you are using the <code class="highlighter-rouge">&lt;picture&gt;</code> element to specify multiple <code class="highlighter-rouge">&lt;source&gt;</code> elements for a specific <code class="highlighter-rouge">&lt;img&gt;</code>, make sure to add the <code class="highlighter-rouge">.img-*</code> classes to the <code class="highlighter-rouge">&lt;img&gt;</code> and not to the <code class="highlighter-rouge">&lt;picture&gt;</code> tag.</p>
            <div class="bs-component">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <picture>
                                <source srcset="https://via.placeholder.com/200x200" type="image/jpg">
                                <img src="https://via.placeholder.com/200x200" class="img-fluid img-thumbnail" alt="200x200">
                            </picture>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>