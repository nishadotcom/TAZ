<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;


/**
 * Demo controller
 */
class DemoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionCategoryproducts()
    {
        return $this->render('categoryproducts');
    }

    public function actionSingleproduct()
    {
        return $this->render('singleproduct');
    }
    public function actionProfiledashboard()
    {
        $this->layout = 'profile_page';
        return $this->render('profiledashboard');
    }
    public function actionAccountprofile()
    {
         $this->layout = 'profile_page';
        return $this->render('account_profile');
    }
    public function actionMyAddress()
    {
         $this->layout = 'profile_page';
        return $this->render('my_address');
    }
    public function actionAllOrders()
    {
         $this->layout = 'profile_page';
        return $this->render('all_orders');
    }
    public function actionWishList()
    {
         $this->layout = 'profile_page';
        return $this->render('all_orders');
    }
    public function actionSingleOrder()
    {
        $this->layout = 'profile_page';
        return $this->render('single_order');
    }
    public function actionSignup()
    {
          return $this->render('signup');
    }
    public function actionCart()
    {      $this->layout = 'cart_page';
          return $this->render('cart');
    }
    public function actionCheckout()
    {      
          return $this->render('checkout');
    }
    public function actionCheckoutStep2()
    {      
          return $this->render('checkout_step2');
    }
    public function actionCheckoutStep3()
    {      
          return $this->render('checkout_step3');
    }
    public function actionCheckoutStep4()
    {      
          return $this->render('checkout_step4');
    }
     public function actionCheckoutConfirm()
    {      
          return $this->render('checkout_confirm');
    }


    
    
    
}
