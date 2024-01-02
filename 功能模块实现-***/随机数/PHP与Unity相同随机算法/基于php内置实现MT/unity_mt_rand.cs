using UnityEngine;

public class RandomSeedGenerator : MonoBehaviour
{
    private uint seed = 12345; // 初始种子
    private MersenneTwister random;
    private uint[] seeds; // 存储生成的随机种子

    private void Start()
    {
        random = new MersenneTwister(seed);
        seeds = new uint[50]; // 初始化数组大小

        GenerateRandomSeeds();
        PrintSeeds();
    }

    private void GenerateRandomSeeds()
    {
        for (int i = 0; i < 50; i++)
        {
            seeds[i] = random.NextUInt32();
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