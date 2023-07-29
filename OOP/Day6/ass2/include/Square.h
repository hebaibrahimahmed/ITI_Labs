#ifndef SQUARE_H
#define SQUARE_H
#include "Rectangle.h"
using namespace std;
class Square : public Rectangle
{


    public:
      Square() {}
      Square(int w)
        {
            dim1=dim2=w;

        }
        int GetArea()
        {
            int area=dim1*dim2;
            return area;
        }
            void WhoIam(){
         cout <<"I am Square"<<endl;
        }
        void Display(){
            WhoIam();
        }


    protected:

    private:
};

#endif // SQUARE_H
