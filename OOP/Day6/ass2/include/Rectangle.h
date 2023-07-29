#ifndef RECTANGLE_H
#define RECTANGLE_H
#include "Shape.h"
using namespace std;

class Rectangle : public Shape
{
    public:
        Rectangle(int x,int y)
        {
            dim1=x;
            dim2=y;
        }
         Rectangle()
        {

        }
        int GetArea()
        {
            int area=dim1*dim2;
            return area;
        }
          void WhoIam(){
         cout <<"I am Rectangle"<<endl;
        }
        void Display(){
            WhoIam();
        }



    protected:

    private:
};

#endif // RECTANGLE_H
