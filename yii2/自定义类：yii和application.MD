### yii2框架自定义类：Yii和application，解决phpstorm的代码提示问题
#### 以yii2-app-basic模板，重写yii/web/application为例
    1.自定义类：yii/web/MyApplication继承yii/web/Application。（注意namespace）
    2.自定义：Yii类，继承yii/BaseYii，重写$app属性的注释。（相当于重写框架原本的Yii）
    3.在入口文件index.php文件中，替换成自定义类：Yii和Application
    4.至此就可以在自定义的Application中给配置文件中引入的组件书写get方法，并通过注释：@property或@var，提供提示
    
#### 在console应用及其他的应用中修改方法同理。