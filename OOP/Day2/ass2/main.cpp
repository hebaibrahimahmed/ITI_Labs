#include <iostream>
using namespace std;


class fraction {

private:

    int a ,b;

public :

  void seta(int n){
  a = n;
  }

 geta(){
 return a;
 }


setb(int m){
  b=m;
}
getb(){

return b;
}



fraction(int a , int b )
{

 seta(a);
 setb(b);
}

void display(){

    cout << a << "/" << b<<endl;
}

   addtwofraction(fraction f2){

    fraction result ;

        result.a = (this.b *f2.a) + (this.a * f2.b )
        result.b = this.a * this.b

       return result;

}

};


int main (){


fraction f1 (5/6);

fraction f2(8/4);

f1.display();

f2.display():

 f1=f2;
 f1.display;

 fraction f3 =f1(f2);

 f3.display();


return 0;
};


