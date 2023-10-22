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

# 5、统一处理错误返回

# 6、api用户认证
## 框架自带的用户认证 'auth.basic'；构造方法注入这个中间件
## jwt 参考https://jwt-auth.readthedocs.io/en/develop/quick-start/
## 
