https://terrencetejada.com/web/file-upload-vue-to-laravel/

App\Models\Calendars;
'start' => 'date:Y-m-d H:i',
'end' => 'date:Y-m-d H:i',


SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));

alter VIEW `vw_posiscion` AS 
select `u`.`name` AS `name`,
		`u`.`alias` AS `alias`,
		`u`.`id` AS `id_user`,
        `u`.`email` AS `email`,
		sum(`p`.`puntuacion`) AS `puntuacion` 
from (`tbl_puntuacions` `p` 
	join `users` `u` on(((`p`.`user_id` = `u`.`id`) and (`u`.`tipo_user` = 'proveedor')))) 	
group by `u`.`name`,`u`.`alias` order by sum(`p`.`puntuacion`) desc,`u`.`name`;



alter VIEW `vw_pocision_mes`  AS 
select `u`.`name` AS `name`,
`u`.`alias` AS `alias`,
`u`.`id` AS `id_user`,
sum(`p`.`puntuacion`) AS `puntuacion`,
date_format(`p`.`created_at`,'%m/%Y') AS `fecha` 
from `tbl_puntuacions` `p` 
      join `users` `u` on `p`.`user_id` = `u`.`id` and `u`.`tipo_user` = 'proveedor' 
      group by `u`.`name`,`u`.`alias`, date_format(`p`.`created_at`,'%m/%Y') 
      order by 4 desc;



ALTER VIEW `vw_pocision_mes` AS 
select `u`.`name` AS `name`,`u`.`alias` AS `alias`,
`u`.`id` AS `id_user`,
`p`.`puntuacion` AS `puntuacion`,
date_format(`p`.`created_at`,'%m/%Y') AS `fecha` 
from (`tbl_puntuacions` `p` join `users` `u` on(((`p`.`user_id` = `u`.`id`) and (`u`.`tipo_user` = 'proveedor')))) order by `p`.`puntuacion` desc,`u`.`name`
