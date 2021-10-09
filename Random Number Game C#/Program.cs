using System;

namespace Number_Guess
{
    class Program
    {
        static void Main(string[] args)
        {
            Random rnd = new Random();
            int number = rnd.Next(0, 100);
            bool win = false;

            do {
                Console.WriteLine("Guess Number Between 0 and 100");
                int input = Convert.ToInt32(Console.ReadLine());

                if (input > number) {
                Console.WriteLine("Your guess is to high.. try again");
                }

                else if (input < number) {
                    Console.WriteLine("Your guess is to low.. try again");
                }

                else if (input == number) {
                    Console.WriteLine("Your guess is to correct!! Well played");
                    win = true;
                }

            } while (win==false);



            
        }
    }
}
