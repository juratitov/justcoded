тестовое задание по YII2 для вас:
1. спроектировать базу данных для следующих сущностей:

-продукты с категориями.
-продукт может быть в разных категориях.
-категории с иерархической структурой ( id, parent_id)
-у продуктов может быть список фото.
-у продуктов могут быть скидки в зависимости от количества.

2. для всего кроме последнего пункта (он не обязательный) реализовать стандартные (насколько это возможно) CRUD
3. реализовать REST API метод getProductDetails(product_id) - в результирующем объекте должна быть вся информация о продукте, включая картинки, категории, скидки

использовать минимальный набор необходимых полей для сущностей. только ключевые (связи, названия итп)


API url:
http://YOUR_HOST/api/products?expand=sales,categories,pictures

or

curl -i -H "Accept:application/json" "http://YOUR_HOST/api/product?expand=sales,categories,pictures


Create folder "uploads/" in web root 
