<footer>
<p>Lucia Caffa - lucaffa@gmail.com</p>
<?php $nombre = array ('Lucia Caffa'=>'lucaffa@gmail.com', 'Alejandra Laxalde'=>'alaxalde@ameba.com.uy');

foreach ($nombre as $uno => $email) {
	echo '<a href="mailto:'.$email.'">'.$uno.'</a>';
}
?>
</footer>
</body>
</html>


