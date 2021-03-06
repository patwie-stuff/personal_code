<?php $title = 'API Documentation'; ?>
<?php include 'header.php'; ?>

<?php include 'apinav.php'; ?>

<h2>API Documentation</h2>

<p>There a couple of things that don&rsquo;t really fit in to any of the class references listed above. The first one is that there exist a series of shorthand functions for creating objects in Sylvester. They are:</p>

<ul>
  <li><code>$V</code> &ndash; short for <a href="<?php echo ROOT.'/api/vector#create'; ?>"><code>Vector.create</code></a></li>
  <li><code>$M</code> &ndash; short for <a href="<?php echo ROOT.'/api/matrix#create'; ?>"><code>Matrix.create</code></a></li>
  <li><code>$L</code> &ndash; short for <a href="<?php echo ROOT.'/api/line#create'; ?>"><code>Line.create</code></a></li>
  <li><code>$P</code> &ndash; short for <a href="<?php echo ROOT.'/api/plane#create'; ?>"><code>Plane.create</code></a></li>
</ul>

<h3>Note on accuracy</h3>

<p>The second is that a lot of functionality in Sylvester relies on computing various quantities and comparing them to zero. Rounding errors on floating point numbers mean that quantities that should be zero can actually be a bit off. Therefore, quantities are compared to the value of <code>Sylvester.precision</code> &ndash; if the absolute value of <code>x</code> is less than this number, <code>x</code> is considered to be equal to zero. By default, <code>Sylvester.precision</code> is set to <code>1e-6</code>, but you can just set the value yourself if you want to be more strict &ndash; it should ideally be several orders of magnitude smaller than the vector/matrix elements you&rsquo;re working with.</p>

<h3>Null return values</h3>

<p>Finally, as a general rule, trying to compute something that is not mathematically meaningful (like multiplying matrices with incompatible sizes) will produce a result of <code>null</code>. Similarly, trying to compute something that does not exist, such as the intersection of two parallel lines, will return <code>null</code>.</p>

<?php include 'footer.php'; ?>
