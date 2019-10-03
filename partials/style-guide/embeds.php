<!-- Buttons
        ================================================== -->
<div id="embeds" class="bs-docs-section">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-12">
                <h1>Embeds</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2>About</h2>
            <p>Rules are directly applied to <code class="highlighter-rouge">&lt;iframe&gt;</code>, <code
                        class="highlighter-rouge">&lt;embed&gt;</code>, <code
                        class="highlighter-rouge">&lt;video&gt;</code>, and <code class="highlighter-rouge">&lt;object&gt;</code>
                elements; optionally use an explicit descendant class <code class="highlighter-rouge">.embed-responsive-item</code>
                when you want to match the styling for other attributes.</p>
            <p><strong>Pro-Tip!</strong> You don’t need to include <code
                        class="highlighter-rouge">frameborder="0"</code> in your <code class="highlighter-rouge">&lt;iframe&gt;</code>s
                as we override that for you.</p>
            <h2>Example</h2>
            <p>Wrap any embed like an <code class="highlighter-rouge">&lt;iframe&gt;</code> in a parent element with
                <code class="highlighter-rouge">.embed-responsive</code> and an aspect ratio. The <code
                        class="highlighter-rouge">.embed-responsive-item</code> isn’t strictly required, but we
                encourage it.</p>
            <div class="bs-component">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"
                            allowfullscreen></iframe>
                </div>
            </div>
            <h2>Aspect ratios</h2>
            <p>Aspect ratios can be customized with modifier classes.</p>
            <figure class="highlight"><pre><code class="language-html" data-lang="html"><span class="c">&lt;!-- 21:9 aspect ratio --&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"embed-responsive embed-responsive-21by9"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;iframe</span> <span class="na">class=</span><span class="s">"embed-responsive-item"</span> <span
                                class="na">src=</span><span class="s">"..."</span><span
                                class="nt">&gt;&lt;/iframe&gt;</span>
<span class="nt">&lt;/div&gt;</span>

<span class="c">&lt;!-- 16:9 aspect ratio --&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"embed-responsive embed-responsive-16by9"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;iframe</span> <span class="na">class=</span><span class="s">"embed-responsive-item"</span> <span
                                class="na">src=</span><span class="s">"..."</span><span
                                class="nt">&gt;&lt;/iframe&gt;</span>
<span class="nt">&lt;/div&gt;</span>

<span class="c">&lt;!-- 4:3 aspect ratio --&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"embed-responsive embed-responsive-4by3"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;iframe</span> <span class="na">class=</span><span class="s">"embed-responsive-item"</span> <span
                                class="na">src=</span><span class="s">"..."</span><span
                                class="nt">&gt;&lt;/iframe&gt;</span>
<span class="nt">&lt;/div&gt;</span>

<span class="c">&lt;!-- 1:1 aspect ratio --&gt;</span>
<span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"embed-responsive embed-responsive-1by1"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;iframe</span> <span class="na">class=</span><span class="s">"embed-responsive-item"</span> <span
                                class="na">src=</span><span class="s">"..."</span><span
                                class="nt">&gt;&lt;/iframe&gt;</span>
<span class="nt">&lt;/div&gt;</span></code></pre>
            </figure>
        </div>
    </div>
</div>