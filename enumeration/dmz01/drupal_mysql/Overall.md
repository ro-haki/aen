- tables in `drupal` db
```
+----------------------------------+
| Tables_in_drupal                 |
+----------------------------------+
| block_content                    |
| block_content__body              |
| block_content_field_data         |
| block_content_field_revision     |
| block_content_revision           |
| block_content_revision__body     |
| cache_bootstrap                  |
| cache_config                     |
| cache_container                  |
| cache_data                       |
| cache_default                    |
| cache_discovery                  |
| cache_dynamic_page_cache         |
| cache_entity                     |
| cache_menu                       |
| cache_page                       |
| cache_render                     |
| cachetags                        |
| comment                          |
| comment__comment_body            |
| comment_entity_statistics        |
| comment_field_data               |
| config                           |
| file_managed                     |
| file_usage                       |
| flood                            |
| history                          |
| key_value                        |
| key_value_expire                 |
| menu_link_content                |
| menu_link_content_data           |
| menu_link_content_field_revision |
| menu_link_content_revision       |
| menu_tree                        |
| node                             |
| node__body                       |
| node__comment                    |
| node__field_image                |
| node__field_tags                 |
| node_access                      |
| node_field_data                  |
| node_field_revision              |
| node_revision                    |
| node_revision__body              |
| node_revision__comment           |
| node_revision__field_image       |
| node_revision__field_tags        |
| path_alias                       |
| path_alias_revision              |
| queue                            |
| router                           |
| search_dataset                   |
| search_index                     |
| search_total                     |
| semaphore                        |
| sequences                        |
| sessions                         |
| shortcut                         |
| shortcut_field_data              |
| shortcut_set_users               |
| taxonomy_index                   |
| taxonomy_term__parent            |
| taxonomy_term_data               |
| taxonomy_term_field_data         |
| taxonomy_term_field_revision     |
| taxonomy_term_revision           |
| taxonomy_term_revision__parent   |
| user__roles                      |
| user__user_picture               |
| users                            |
| users_data                       |
| users_field_data                 |
| watchdog                         |
+----------------------------------+

```
- Connect, password `Sup3RS3cuR3@123`
```
proxychains mysql -u root -p -h 172.18.0.9
```
- `select * from users_field_data;`
	- `admin:$S$EC2Uz..YfIRasblAPLUodfqopenW1mJfjCssyG0shSqfkC/gwq1F` which is a type of Drupal7 hash
![[Pasted image 20240829172816.png]]

- I have read and write permissions in mysql
- in `drupal.session` there is one row
![[Pasted image 20240830102643.png]]
- with a session
```
_sf2_attributes|a:1:{s:3:"uid";s:1:"1";}_sf2_meta|a:4:{s:1:"u";i:1653994619;s:1:"c";i:1653994619;s:1:"l";i:2000000;s:1:"s";s:43:"gsNh8hdUf7LsOXubCUwtR5E7QjfuCVgOlrLhF31tLqo";}
```
- and timestamp 1653994628 that equal `Tue May 31 2022 10:57:08 GMT+0000`