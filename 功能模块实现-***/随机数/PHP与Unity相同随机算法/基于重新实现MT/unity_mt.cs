using UnityEngine;

public class MersenneTwister
{
    private const int N = 624;
    private const int M = 397;
    private const uint MATRIX_A = 0x9908b0df;
    private const uint UPPER_MASK = 0x80000000;
    private const uint LOWER_MASK = 0x7fffffff;

    private uint[] mt;
    private int index;

    public MersenneTwister(int seed)
    {
        mt = new uint[N];
        index = N;

        mt[0] = (uint)seed;

        for (int i = 1; i < N; i++)
        {
            mt[i] = (uint)(1812433253 * (mt[i - 1] ^ (mt[i - 1] >> 30)) + i);
        }
    }

    private void GenerateNumbers()
    {
        for (int i = 0; i < N; i++)
        {
            uint y = (mt[i] & UPPER_MASK) | (mt[(i + 1) % N] & LOWER_MASK);
            mt[i] = mt[(i + M) % N] ^ (y >> 1);

            if (y % 2 != 0)
            {
                mt[i] ^= MATRIX_A;
            }
        }
    }

    public uint ExtractNumber()
    {
        if (index >= N)
        {
            GenerateNumbers();
            index = 0;
        }

        uint y = mt[index++];

        y ^= (y >> 11);
        y ^= (y << 7) & 0x9d2c5680;
        y ^= (y << 15) & 0xefc60000;
        y ^= (y >> 18);

        return y;
    }
}

public class RandomSeedGenerator : MonoBehaviour
{
    private int seed = 12345; // 初始种子

    private MersenneTwister generator;
    private uint[] seeds; // 存储生成的随机种子

    private void Start()
    {
        generator = new MersenneTwister(seed);
        seeds = new uint[50]; // 初始化数组大小

        GenerateRandomSeeds();
        PrintSeeds();
    }

    private void GenerateRandomSeeds()
    {
        for (int i = 0; i < 50; i++)
        {
            seeds[i] = generator.ExtractNumber();
        }
    }

    private void PrintSeeds()
    {
        for (int i = 0; i < 50; i++)
        {
            Debug.Log("Seed " + (i + 1) + ": " + seeds[i]);
        }
    }
}