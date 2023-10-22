# 1、生成测试数据
## php artisan make:migration create_lessons_table --create=lessons
## php artisan make:model Lesson  
## php artisan make:controller LessonController
## php artisan migrate 
## php artisan make:factory LessonFactory --model=Lesson
## php artisan db:seed --class=LessonSeeder 

# 2、初步实现api
## 路由，group和resource

# 3、api字段映射
## response()->json
## 字段映射

# 4、重构api代码，只要有需要复制的地方，都需要重构
## 依赖注入类
## 继承
