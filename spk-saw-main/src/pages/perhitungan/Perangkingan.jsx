/** @format */

import React, { useEffect, useState } from "react";
import usePembobotan from "../../store/pembobotan";
import { MathJax, MathJaxContext } from "better-react-mathjax";
import useAlternatif from "../../store/alternatif";

const Perangkingan = ({ hasilNormalisasi }) => {
  // store
  const { setPembobotan, dtPembobotan } = usePembobotan();
  const { setAlternatif, dtAlternatif } = useAlternatif();
  // state
  const [rangking, setRangking] = useState([]);
  const [sortHasil, setSortHasil] = useState([]);
  // effect
  useEffect(() => {
    setPembobotan({});
    setAlternatif({});
    return () => {};
  }, []);

  const matrixPembobotan = dtPembobotan
    .map((cell) => cell.bobot.toString())
    .join(" & ");
  // perhitungan
  const hasilPerkalian = {};

  // menyimpan hasil perhitungan, alternatif_id, dan alternatif_nama ke dalam state rangking
  useEffect(() => {
    hasilNormalisasi.forEach((alternatif) => {
      const alternatif_id = alternatif[0].alternatif_id;
      const hasil = alternatif.reduce((total, kriteria) => {
        const bobot =
          dtPembobotan.find((p) => p?.kriteria_id === kriteria.kriteria_id)
            ?.bobot || 0;
        return total + kriteria.hasil * bobot;
      }, 0);
      hasilPerkalian[alternatif_id] = hasil;
    });
    const newRangking = Object.entries(hasilPerkalian).map(
      ([alternatif_id, hasil]) => {
        const alternatif_nama = dtAlternatif.find(
          (a) => a.id === alternatif_id
        )?.nama;
        const hasilNormalisasiAlternatif = hasilNormalisasi.find(
          (a) => a[0].alternatif_id === alternatif_id
        );
        let perhitungan = 0;
        if (hasilNormalisasiAlternatif) {
          perhitungan = hasilNormalisasiAlternatif
            .map((kriteria) => {
              const bobot =
                dtPembobotan.find(
                  (p) => p?.kriteria_id === kriteria?.kriteria_id
                )?.bobot || 0;
              return `(${kriteria.hasil}*${bobot})`;
            })
            .join("+");
        }
        return {
          alternatif_id,
          alternatif_nama,
          hasil,
          perhitungan,
        };
      }
    );
    setRangking(newRangking);
    // Urutkan array berdasarkan nilai hasil secara menurun
    const sortedList = [...newRangking].sort((a, b) => b.hasil - a.hasil);
    setSortHasil(sortedList);
    console.log(sortedList); // Output: 0.9
  }, [hasilNormalisasi]);

  return (
    <div className="mb-[10%]">
      <h3 className="text-lg">Nilai Pembobotan</h3>
      <div className="w-fit ml-4">
        <MathJaxContext>
          <MathJax>
            {`\\begin{matrix}
            w= & \\begin{bmatrix}
            ${matrixPembobotan}
            \\end{bmatrix}
          \\end{matrix}`}
          </MathJax>
        </MathJaxContext>
      </div>
      {/* perhitungan perangkingan */}
      <h4 className="text-xl">Perangkingan</h4>
      <div className="ml-4 flex flex-col gap-2 my-2">
        {rangking &&
          rangking.map((row, index) => (
            <p key={index}>
              {row.alternatif_nama}={row.perhitungan} = {row.hasil.toFixed(4)}
            </p>
          ))}
      </div>
      <div className="mt-4">
        <p>
          Dari perbandingan nilai akhir, maka didapatkan nilai sebagai berikut:
        </p>
        {rangking &&
          rangking.map((row, index) => (
            <p key={index} className="ml-4 mt-2">
              {row.alternatif_nama}= {row.hasil.toFixed(4)}
            </p>
          ))}
        <p className="mt-4">
          Maka alternatif yang memiliki nilai tertinggi dan bisa dipilih adalah
          aternatif {sortHasil[0]?.alternatif_nama} dengan nilai{" "}
          {sortHasil[0]?.hasil.toFixed(3)} dan aternatif{" "}
          {sortHasil[1]?.alternatif_nama} dengan nilai{" "}
          {sortHasil[1]?.hasil.toFixed(4)}
        </p>
      </div>
    </div>
  );
};

export default Perangkingan;
