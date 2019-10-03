<div id="bootstrap-grid" class="bootstrap-columns bs-docs-section">
    <div class="page-header">
        <h1>Bootstrap Grid</h1>
    </div>
    <h2>How it works</h2>
    <p>Bootstrap’s grid system uses a series of containers, rows, and columns to layout and align content. It’s built with flexbox and is fully responsive. Below is an example and an in-depth look at how the grid comes together.</p>
    <p><strong>New to or unfamiliar with flexbox?</strong> <a href="https://css-tricks.com/snippets/css/a-guide-to-flexbox/#flexbox-background" target="_blank">Read this CSS Tricks flexbox guide</a> for background, terminology, guidelines, and code snippets.</p>
    <div class="bs-component">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    One of three columns
                </div>
                <div class="col-sm">
                    One of three columns
                </div>
                <div class="col-sm">
                    One of three columns
                </div>
            </div>
        </div>
    </div>
    <p>The above example creates three equal-width columns on small, medium, large, and extra large devices using our predefined grid classes. Those columns are centered in the page with the parent <code>.container</code>.</p>
    <p>Breaking it down, here’s how it works:</p>
    <ul>
        <li>Containers provide a means to center and horizontally pad your site’s contents. Use <code>.container</code> for a responsive pixel width or <code>.container-fluid</code> for <code>width: 100%</code> across all viewport and device sizes.</li>
        <li>Rows are wrappers for columns. Each column has horizontal <code>padding</code> (called a gutter) for controlling the space between them. This <code>padding</code> is then counteracted on the rows with negative margins. This way, all the content in your columns is visually aligned down the left side.</li>
        <li>In a grid layout, content must be placed within columns and only columns may be immediate children of rows.</li>
        <li>Thanks to flexbox, grid columns without a specified <code>width</code> will automatically layout as equal width columns. For example, four instances of <code>.col-sm</code> will each automatically be 25% wide from the small breakpoint and up. See the auto-layout columns section for more examples.</li>
        <li>Column classes indicate the number of columns you’d like to use out of the possible 12 per row. So, if you want three equal-width columns across, you can use <code>.col-4</code>.</li>
        <li>Column <code>width</code>s are set in percentages, so they’re always fluid and sized relative to their parent element.</li>
        <li>Columns have horizontal <code>padding</code> to create the gutters between individual columns, however, you can remove the margin from rows and <code>padding</code> from columns with .<code>no-gutters</code> on the <code>.row</code>.</li>
        <li>To make the grid responsive, there are five grid breakpoints, one for each responsive breakpoint: all breakpoints (extra small), small, medium, large, and extra large.</li>
        <li>Grid breakpoints are based on minimum width media queries, meaning <strong>they apply to that one breakpoint and all those above it</strong> (e.g., <code>.col-sm-4</code> applies to small, medium, large, and extra large devices, but not the first xs breakpoint).</li>
        <li>You can use predefined grid classes (like <code>.col-4</code>) or Sass mixins for more semantic markup.</li>
    </ul>
    <p>Be aware of the limitations and <a href="https://github.com/philipwalton/flexbugs" target="_blank">bugs around flexbox</a>, like the <a href="https://github.com/philipwalton/flexbugs#flexbug-9" target="_blank">inability to use some HTML elements as flex containers</a>.</p>
    <h2>Grid options</h2>
    <p>While Bootstrap uses <code>em</code>s or <code>rem</code>s for defining most sizes, pxs are used for grid breakpoints and container widths. This is because the viewport width is in pixels and does not change with the font size.</p>
    <p>See how aspects of the Bootstrap grid system work across multiple devices with a handy table.</p>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th></th>
            <th class="text-center">
                Extra small<br>
                <small>&lt;576px</small>
            </th>
            <th class="text-center">
                Small<br>
                <small>≥576px</small>
            </th>
            <th class="text-center">
                Medium<br>
                <small>≥768px</small>
            </th>
            <th class="text-center">
                Large<br>
                <small>≥992px</small>
            </th>
            <th class="text-center">
                Extra large<br>
                <small>≥1200px</small>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th class="text-nowrap" scope="row">Max container width</th>
            <td>None (auto)</td>
            <td>540px</td>
            <td>720px</td>
            <td>960px</td>
            <td>1140px</td>
        </tr>
        <tr>
            <th class="text-nowrap" scope="row">Class prefix</th>
            <td><code>.col-</code></td>
            <td><code>.col-sm-</code></td>
            <td><code>.col-md-</code></td>
            <td><code>.col-lg-</code></td>
            <td><code>.col-xl-</code></td>
        </tr>
        <tr>
            <th class="text-nowrap" scope="row"># of columns</th>
            <td colspan="5">12</td>
        </tr>
        <tr>
            <th class="text-nowrap" scope="row">Gutter width</th>
            <td colspan="5">30px (15px on each side of a column)</td>
        </tr>
        <tr>
            <th class="text-nowrap" scope="row">Nestable</th>
            <td colspan="5">Yes</td>
        </tr>
        <tr>
            <th class="text-nowrap" scope="row">Column ordering</th>
            <td colspan="5">Yes</td>
        </tr>
        </tbody>
    </table>
    <h2>Auto-layout columns</h2>
    <p>Utilize breakpoint-specific column classes for easy column sizing without an explicit numbered class like <span class="code">.col-sm-6</span>.</p>

    <h3>Equal-width</h3>
    <p>For example, here are two grid layouts that apply to every device and viewport, from <code>xs</code> to <code>xl</code>. Add any number of unit-less classes for each breakpoint you need and every column will be the same width.</p>
    <div class="bs-component">
        <div class="container">
            <div class="row">
                <div class="col">
                    1 of 2
                </div>
                <div class="col">
                    2 of 2
                </div>
            </div>
            <div class="row">
                <div class="col">
                    1 of 3
                </div>
                <div class="col">
                    2 of 3
                </div>
                <div class="col">
                    3 of 3
                </div>
            </div>
        </div>
    </div>
    <p>Equal-width columns can be broken into multiple lines, but there was a <a href="https://github.com/philipwalton/flexbugs#flexbug-11" target="_blank">Safari flexbox bug</a> that prevented this from working without an explicit <code>flex-basis</code> or <code>border</code>. There are workarounds for older browser versions, but they shouldn’t be necessary if you’re up-to-date.</p>
    <div class="bs-component">
        <div class="container">
            <div class="row">
                <div class="col">Column</div>
                <div class="col">Column</div>
                <div class="w-100"></div>
                <div class="col">Column</div>
                <div class="col">Column</div>
            </div>
        </div>
    </div>
    <h3>Setting one column width</h3>
    <p>Auto-layout for flexbox grid columns also means you can set the width of one column and have the sibling columns automatically resize around it. You may use predefined grid classes (as shown below), grid mixins, or inline widths. Note that the other columns will resize no matter the width of the center column.</p>
    <div class="bs-component">
        <div class="container">
            <div class="row">
                <div class="col">
                    1 of 3
                </div>
                <div class="col-6">
                    2 of 3 (wider)
                </div>
                <div class="col">
                    3 of 3
                </div>
            </div>
            <div class="row">
                <div class="col">
                    1 of 3
                </div>
                <div class="col-5">
                    2 of 3 (wider)
                </div>
                <div class="col">
                    3 of 3
                </div>
            </div>
        </div>
    </div>
    <h3>Variable width content</h3>
    <p>Use <code>col-{breakpoint}-auto</code> classes to size columns based on the natural width of their content.</p>
    <div class="bs-component">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-lg-2">
                    1 of 3
                </div>
                <div class="col-md-auto">
                    Variable width content
                </div>
                <div class="col col-lg-2">
                    3 of 3
                </div>
            </div>
            <div class="row">
                <div class="col">
                    1 of 3
                </div>
                <div class="col-md-auto">
                    Variable width content
                </div>
                <div class="col col-lg-2">
                    3 of 3
                </div>
            </div>
        </div>
    </div>
    <h3>Equal-width multi-row</h3>
    <p>Create equal-width columns that span multiple rows by inserting a <code>.w-100</code> where you want the columns to break to a new line. Make the breaks responsive by mixing the <code>.w-100</code> with some responsive display utilities.</p>
    <div class="bs-component">
        <div class="container">
            <div class="row">
                <div class="col">col</div>
                <div class="col">col</div>
                <div class="w-100"></div>
                <div class="col">col</div>
                <div class="col">col</div>
            </div>
        </div>
    </div>
    <h2>Responsive classes</h2>
    <p>Bootstrap’s grid includes five tiers of predefined classes for building complex responsive layouts. Customize the size of your columns on extra small, small, medium, large, or extra large devices however you see fit.</p>
    <h3>All breakpoints</h3>
    <p>For grids that are the same from the smallest of devices to the largest, use the <code>.col</code> and <code>.col-*</code> classes. Specify a numbered class when you need a particularly sized column; otherwise, feel free to stick to <code>.col</code>.</p>
    <div class="bs-component">
        <div class="container">
            <div class="row">
                <div class="col">col</div>
                <div class="col">col</div>
                <div class="col">col</div>
                <div class="col">col</div>
            </div>
            <div class="row">
                <div class="col-8">col-8</div>
                <div class="col-4">col-4</div>
            </div>
        </div>
    </div>
    <h3>Stacked to horizontal</h3>
    <p>Using a single set of <code>.col-sm-*</code> classes, you can create a basic grid system that starts out stacked before becoming horizontal with at the small breakpoint (<code>sm</code>).</p>
    <div class="bs-component">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">col-sm-8</div>
                <div class="col-sm-4">col-sm-4</div>
            </div>
            <div class="row">
                <div class="col-sm">col-sm</div>
                <div class="col-sm">col-sm</div>
                <div class="col-sm">col-sm</div>
            </div>
        </div>
    </div>
    <h3>Mix and match</h3>
    <p>Don’t want your columns to simply stack in some grid tiers? Use a combination of different classes for each tier as needed. See the example below for a better idea of how it all works.</p>
    <div class="bs-component">
        <div class="container">
            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
                <div class="col-12 col-md-8">.col-12 .col-md-8</div>
                <div class="col-6 col-md-4">.col-6 .col-md-4</div>
            </div>

            <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
            <div class="row">
                <div class="col-6 col-md-4">.col-6 .col-md-4</div>
                <div class="col-6 col-md-4">.col-6 .col-md-4</div>
                <div class="col-6 col-md-4">.col-6 .col-md-4</div>
            </div>

            <!-- Columns are always 50% wide, on mobile and desktop -->
            <div class="row">
                <div class="col-6">.col-6</div>
                <div class="col-6">.col-6</div>
            </div>
        </div>
    </div>
    <h2>Alignment</h2>
    <p>Use flexbox alignment utilities to vertically and horizontally align columns.</p>
    <h3>Vertical alignment</h3>
    <div class="bs-component bd-example-row-flex-cols">
        <div class="container">
            <div class="row align-items-start">
                <div class="col">
                    One of three columns
                </div>
                <div class="col">
                    One of three columns
                </div>
                <div class="col">
                    One of three columns
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col">
                    One of three columns
                </div>
                <div class="col">
                    One of three columns
                </div>
                <div class="col">
                    One of three columns
                </div>
            </div>
            <div class="row align-items-end">
                <div class="col">
                    One of three columns
                </div>
                <div class="col">
                    One of three columns
                </div>
                <div class="col">
                    One of three columns
                </div>
            </div>
        </div>
    </div>
    <div class="bs-component bd-example-row-flex-cols">
        <div class="container">
            <div class="row">
                <div class="col align-self-start">
                    One of three columns
                </div>
                <div class="col align-self-center">
                    One of three columns
                </div>
                <div class="col align-self-end">
                    One of three columns
                </div>
            </div>
        </div>
    </div>
    <h3>Horizontal alignment</h3>
    <div class="bs-component">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-4">
                    One of two columns
                </div>
                <div class="col-4">
                    One of two columns
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-4">
                    One of two columns
                </div>
                <div class="col-4">
                    One of two columns
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-4">
                    One of two columns
                </div>
                <div class="col-4">
                    One of two columns
                </div>
            </div>
            <div class="row justify-content-around">
                <div class="col-4">
                    One of two columns
                </div>
                <div class="col-4">
                    One of two columns
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-4">
                    One of two columns
                </div>
                <div class="col-4">
                    One of two columns
                </div>
            </div>
        </div>
    </div>
    <h2>No gutters</h2>
    <p>The gutters between columns in our predefined grid classes can be removed with <code>.no-gutters</code>. This removes the negative <code>margin</code>s from <code>.row</code> and the horizontal <code>padding</code> from all immediate children columns.</p>

    <p>Here’s the source code for creating these styles. Note that column overrides are scoped to only the first children columns and are targeted via attribute selector. While this generates a more specific selector, column padding can still be further customized with spacing utilities.</p>

    <p><strong>Need an edge-to-edge design?</strong> Drop the parent <code>.container</code> or <code>.container-fluid</code>.</p>
    <div class="code">
        <pre>
            .no-gutters {
              margin-right: 0;
              margin-left: 0;

              > .col,
              > [class*="col-"] {
                padding-right: 0;
                padding-left: 0;
              }
            }
        </pre>
    </div>
    <p>In practice, here’s how it looks. Note you can continue to use this with all other predefined grid classes (including column widths, responsive tiers, reorders, and more).</p>
    <div class="bs-component">
        <div class="row no-gutters">
            <div class="col-12 col-sm-6 col-md-8">.col-12 .col-sm-6 .col-md-8</div>
            <div class="col-6 col-md-4">.col-6 .col-md-4</div>
        </div>
    </div>
    <h2>Column wrapping</h2>
    <p>If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.</p>
    <div class="bs-component">
        <div class="container">
            <div class="row">
                <div class="col-9">.col-9</div>
                <div class="col-4">.col-4<br>Since 9 + 4 = 13 &gt; 12, this 4-column-wide div gets wrapped onto a new line as one contiguous unit.</div>
                <div class="col-6">.col-6<br>Subsequent columns continue along the new line.</div>
            </div>
        </div>
    </div>
    <h2>Column breaks</h2>
    <p>Breaking columns to a new line in flexbox requires a small hack: add an element with <code>width: 100%</code> wherever you want to wrap your columns to a new line. Normally this is accomplished with multiple <code>.row</code>s, but not every implementation method can account for this.</p>
    <div class="bs-component">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-3">.col-6 .col-sm-3</div>
                <div class="col-6 col-sm-3">.col-6 .col-sm-3</div>

                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>

                <div class="col-6 col-sm-3">.col-6 .col-sm-3</div>
                <div class="col-6 col-sm-3">.col-6 .col-sm-3</div>
            </div>
        </div>
    </div>
    <p>You may also apply this break at specific breakpoints with our responsive display utilities.</p>
    <div class="bs-component">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-4">.col-6 .col-sm-4</div>
                <div class="col-6 col-sm-4">.col-6 .col-sm-4</div>

                <!-- Force next columns to break to new line at md breakpoint and up -->
                <div class="w-100 d-none d-md-block"></div>

                <div class="col-6 col-sm-4">.col-6 .col-sm-4</div>
                <div class="col-6 col-sm-4">.col-6 .col-sm-4</div>
            </div>
        </div>
    </div>
    <h2>Reordering</h2>
    <h3>Order classes</h3>
    <p>Use <code>.order-</code> classes for controlling the visual order of your content. These classes are responsive, so you can set the <code>order</code> by breakpoint (e.g., <code>.order-1.order-md-2</code>). Includes support for 1 through 12 across all five grid tiers.</p>
    <div class="bs-component">
        <div class="container">
            <div class="row">
                <div class="col">
                    First, but unordered
                </div>
                <div class="col order-12">
                    Second, but last
                </div>
                <div class="col order-1">
                    Third, but first
                </div>
            </div>
        </div>
    </div>
    <p>There are also responsive <code>.order-first</code> and <code>.order-last</code> classes that change the <code>order</code> of an element by applying <code>order: -1</code> and <code>order: 13</code> (<code>order: $columns + 1</code>), respectively. These classes can also be intermixed with the numbered <code>.order-*</code> classes as needed.</p>
    <div class="bs-component">
        <div class="container">
            <div class="row">
                <div class="col order-last">
                    First, but last
                </div>
                <div class="col">
                    Second, but unordered
                </div>
                <div class="col order-first">
                    Third, but first
                </div>
            </div>
        </div>
    </div>
    <h2>Offsetting columns</h2>
    <p>You can offset grid columns in two ways: our responsive <code>.offset-</code> grid classes and our margin utilities. Grid classes are sized to match columns while margins are more useful for quick layouts where the width of the offset is variable.</p>
    <h3>Offset classes</h3>
    <p>Move columns to the right using <code>.offset-md-*</code> classes. These classes increase the left margin of a column by <code>*</code> columns. For example, <code>.offset-md-4</code> moves <code>.col-md-4</code> over four columns.</p>
    <div class="bs-component">
        <div class="container">
            <div class="row">
                <div class="col-md-4">.col-md-4</div>
                <div class="col-md-4 offset-md-4">.col-md-4 .offset-md-4</div>
            </div>
            <div class="row">
                <div class="col-md-3 offset-md-3">.col-md-3 .offset-md-3</div>
                <div class="col-md-3 offset-md-3">.col-md-3 .offset-md-3</div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">.col-md-6 .offset-md-3</div>
            </div>
        </div>
    </div>
    <p>In addition to column clearing at responsive breakpoints, you may need to reset offsets. See this in action in the grid example.</p>
    <div class="bs-component">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-md-6">.col-sm-5 .col-md-6</div>
                <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">.col-sm-5 .offset-sm-2 .col-md-6 .offset-md-0</div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-5 col-lg-6">.col-sm-6 .col-md-5 .col-lg-6</div>
                <div class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">.col-sm-6 .col-md-5 .offset-md-2 .col-lg-6 .offset-lg-0</div>
            </div>
        </div>
    </div>
    <h2>Margin utilities</h2>
    <p>With the move to flexbox in v4, you can use margin utilities like <code>.mr-auto</code> to force sibling columns away from one another.</p>
    <div class="bs-component">
        <div class="container">
            <div class="row">
                <div class="col-md-4">.col-md-4</div>
                <div class="col-md-4 ml-auto">.col-md-4 .ml-auto</div>
            </div>
            <div class="row">
                <div class="col-md-3 ml-md-auto">.col-md-3 .ml-md-auto</div>
                <div class="col-md-3 ml-md-auto">.col-md-3 .ml-md-auto</div>
            </div>
            <div class="row">
                <div class="col-auto mr-auto">.col-auto .mr-auto</div>
                <div class="col-auto">.col-auto</div>
            </div>
        </div>
    </div>
    <h2>Nesting</h2>
    <p>To nest your content with the default grid, add a new <code>.row</code> and set of <code>.col-sm-</code>* columns within an existing <code>.col-sm-*</code> column. Nested rows should include a set of columns that add up to 12 or fewer (it is not required that you use all 12 available columns).</p>
    <div class="bs-component">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    Level 1: .col-sm-9
                    <div class="row">
                        <div class="col-8 col-sm-6">
                            Level 2: .col-8 .col-sm-6
                        </div>
                        <div class="col-4 col-sm-6">
                            Level 2: .col-4 .col-sm-6
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h2>Sass mixins</h2>
    <p>When using Bootstrap’s source Sass files, you have the option of using Sass variables and mixins to create custom, semantic, and responsive page layouts. Our predefined grid classes use these same variables and mixins to provide a whole suite of ready-to-use classes for fast responsive layouts.</p>
    <h3>Variables</h3>
    <p>Variables and maps determine the number of columns, the gutter width, and the media query point at which to begin floating columns. We use these to generate the predefined grid classes documented above, as well as for the custom mixins listed below.</p>
    <div class="code">
        <pre>
            $grid-columns:      12;
            $grid-gutter-width: 30px;

            $grid-breakpoints: (
              // Extra small screen / phone
              xs: 0,
              // Small screen / phone
              sm: 576px,
              // Medium screen / tablet
              md: 768px,
              // Large screen / desktop
              lg: 992px,
              // Extra large screen / wide desktop
              xl: 1200px
            );

            $container-max-widths: (
              sm: 540px,
              md: 720px,
              lg: 960px,
              xl: 1140px
            );
        </pre>
    </div>
    <h2>Mixins</h2>
    <p>Mixins are used in conjunction with the grid variables to generate semantic CSS for individual grid columns.</p>
    <div class="code">
        <pre>
            // Creates a wrapper for a series of columns
            @include make-row();

            // Make the element grid-ready (applying everything but the width)
            @include make-col-ready();
            @include make-col($size, $columns: $grid-columns);

            // Get fancy by offsetting, or changing the sort order
            @include make-col-offset($size, $columns: $grid-columns);
        </pre>
    </div>
    <h3>Example usage</h3>
    <p>You can modify the variables to your own custom values, or just use the mixins with their default values. Here’s an example of using the default settings to create a two-column layout with a gap between.</p>
    <div class="code">
        <pre>
            .example-container {
              width: 800px;
              @include make-container();
            }

            .example-row {
              @include make-row();
            }

            .example-content-main {
              @include make-col-ready();

              @include media-breakpoint-up(sm) {
                @include make-col(6);
              }
              @include media-breakpoint-up(lg) {
                @include make-col(8);
              }
            }

            .example-content-secondary {
              @include make-col-ready();

              @include media-breakpoint-up(sm) {
                @include make-col(6);
              }
              @include media-breakpoint-up(lg) {
                @include make-col(4);
              }
            }
        </pre>
    </div>
    <div class="bs-component">
        <div class="example-container">
            <div class="example-row">
                <div class="example-content-main">Main content</div>
                <div class="example-content-secondary">Secondary content</div>
            </div>
        </div>
    </div>
    <h2>Customizing the grid</h2>
    <p>Using our built-in grid Sass variables and maps, it’s possible to completely customize the predefined grid classes. Change the number of tiers, the media query dimensions, and the container widths—then recompile.</p>
    <h3>Columns and gutters</h3>
    <p>The number of grid columns can be modified via Sass variables. <code>$grid-columns</code> is used to generate the widths (in percent) of each individual column while <code>$grid-gutter-width</code> sets the width for the column gutters.</p>
    <div class="code">
        <pre>
            $grid-columns: 12 !default;
            $grid-gutter-width: 30px !default;
        </pre>
    </div>
    <h2>Grid tiers</h2>
    <p>Moving beyond the columns themselves, you may also customize the number of grid tiers. If you wanted just four grid tiers, you’d update the <code>$grid-breakpoints</code> and <code>$container-max-widths</code> to something like this:</p>
    <div class="code">
        <pre>
            $grid-breakpoints: (
              xs: 0,
              sm: 480px,
              md: 768px,
              lg: 1024px
            );

            $container-max-widths: (
              sm: 420px,
              md: 720px,
              lg: 960px
            );
        </pre>
    </div>
    <p>When making any changes to the Sass variables or maps, you’ll need to save your changes and recompile. Doing so will output a brand new set of predefined grid classes for column widths, offsets, and ordering. Responsive visibility utilities will also be updated to use the custom breakpoints. Make sure to set grid values in <code>px</code> (not <code>rem</code>, <code>em</code>, or <code>%</code>).</p>
</div>