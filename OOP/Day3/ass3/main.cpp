#include <iostream>

using namespace std;

class Fraction{

public:

     int Num, Dem;
    int *Values;

    void setNum(int n)
    {
        Num = n;
    }
    int GetNum()
    {
        return Num;
    }

    void setDem(int d)
    {
        Dem = d;
    }
    int GetDem()
    {
        return Dem;
    }

    Fraction ()
    {

     Values = new int [5];
    }

    Fraction (int Num ,int Dem)
    {
     setNum(Num);
     setDem(Dem);

      Values = new int [5];
    }
    void Display()
    {
        cout<< Num << "/"<< Dem << endl;

    }

    Fraction Add(Fraction f1)
    {
        Fraction result ;
        result.Dem = Dem * f1.Dem ;
        result.Num = (Num * f1.Dem) + (f1.Num * Dem);
        return result;
    }

    Fraction operator+ (Fraction f1)
    {
       Fraction result ;
        result.Dem = Dem * f1.Dem ;
        result.Num = (Num * f1.Dem) + (f1.Num * Dem);
        return result;
    }



    Fraction operator- (Fraction f1)
    {
       Fraction result ;
        result.Dem = Dem * f1.Dem ;
        result.Num = (Num * f1.Dem) - (f1.Num * Dem);
        return result;
    }




    Fraction operator= (Fraction f1)
    {
        this->Num = f1.Num;
        this->Dem = f1.Dem;
       // this->Values = new int [5];//f1.Values;
           this->Values = new int[5];
            for(int index = 0; index < 5; index++)
            {
                this->Values[index] = f1.Values[index];
            }

    return *this;
    }
};


int main()
{
    Fraction f1 ,f2,f3;
    f1.setNum(1);
    f1.setDem(2);

    f2.setNum(1);
    f2.setDem(4);

    //f3 = f1.Add(f2);
    f3=f1+f2;
    f3.Display();

    f3=f1-f2;
    f3.Display();


    f1 = f2;
    f1.Display();

      cout <<f1.Values[0]<<endl;
      cout <<f2.Values[0]<<endl;


f1=f2=f3;
f3.Display();
f2.Display();
f1.Display();

    return 0;
}


