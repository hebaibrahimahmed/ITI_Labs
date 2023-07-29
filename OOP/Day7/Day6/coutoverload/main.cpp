#include <iostream>

using namespace std;
class Fraction{
    public :
        int numerator;
        int denominator;
        Fraction(int upper,int lower){
            numerator = upper;
            denominator = lower;
        }
        Fraction(int upper){
            numerator = upper;
            denominator = 1;
        }
        Fraction(){
            numerator =1;
            denominator=1;
        }
        friend istream& operator>>(istream& in, Fraction& c)
    {

        in >> c.numerator >> c.denominator;
        return in;
    }

    friend ostream& operator<<(ostream& output, Fraction& c)
    {
        output << c.numerator << "/" << c.denominator;
        return output;
    }
};
int main()
{  Fraction x;
    cout << "Enter a num  and dom  "
            "Fraction: ";
    cin >> x;
    cout << "Fraction is: ";
    cout << x;
    return 0;
}
