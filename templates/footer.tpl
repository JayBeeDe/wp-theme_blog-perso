			<!--footer.tpl begins-->
			</section>
			</div>
			<!--class="container-fluid" class="row"-->
			<footer>
			    <div class="col-sm-8" id="footerContent">
			        <p> Copyright &#169; {$footerDate} {$blogName} ?>
			            <br />
			            <a href="feed:{$rss2}">Articles (RSS)</a>.
			            {$footerNumQueries} requêtes. {$footerTimer} secondes.
			        </p>
			        <!-- <?php wp_footer(); ?> display toolbar if logged-->
			    </div>
			    <div class="col-sm-1">
			        <a href="{$social1Url}" title="{$social1Name}">
			            <img src="{$social1Logo}" alt="{$social1Name}" class="socialLogo" />
			        </a>
			    </div>
			    <div class="col-sm-1">
			        <a href="{$social2Url}" title="{$social2Name}">
			            <img src="{$social2Logo}" alt="{$social2Name}" class="socialLogo" />
			        </a>
			    </div>
			    <div class="col-sm-1">
			        <a href="{$social3Url}" title="{$social3Name}">
			            <img src="{$social3Logo}" alt="{$social3Name}" class="socialLogo" />
			        </a>
			    </div>
			    <div class="col-sm-1">
			        <a href="{$social4Url}" title="{$social4Name}">
			            <img src="{$social4Logo}" alt="{$social4Name}" class="socialLogo" />
			        </a>
			    </div>
			</footer>
			</div>
			<!--This is the end of the div id page-->

			<script type="text/javascript" src="/wp-includes/js/jquery/jquery.js"></script>
			<script src="{$templateDir}/lib/Bootstrap/js/bootstrap.min.js"></script>