#ifndef CIRCLE_H
#define CIRCLE_H
using namespace std;

class Circle : public Shape
{
    public:
         Circle() {}
        Circle(int a)
        {

            dim1=a;

        }

        int GetArea()
        {
            int area=dim1*dim1*3.14;
            return area;


        }
            void WhoIam(){
         cout <<"I am Circle"<<endl;
        }
        void Display(){
            WhoIam();
        }

    protected:

    private:
};

#endif // CIRCLE_H
