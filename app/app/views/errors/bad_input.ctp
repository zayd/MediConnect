<taconite>
	<replaceContent select=".main">
		<div class="content">
		<?php
		echo $html->para(null, "Oops, it appears the input given to us was invalid. The {$problem}.");
		echo $html->para(null, 'We apologize for any inconvenice caused, and suggest that you either go ' . $html->link('back', 'javascript:history.back()') . ' to the previous page or else return to the ' . $html->link('home page', '/homes') . '.');
		?>
		</div>
	</replaceContent>
</taconite>