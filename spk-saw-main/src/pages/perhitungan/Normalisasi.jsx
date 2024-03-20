/** @format */

import { MathJax, MathJaxContext } from "better-react-mathjax";
import React, { useEffect, useState } from "react";
import Perangkingan from "./Perangkingan";

const Normalisasi = ({ dtAlternatif, dtKriteria, dtNilai }) => {
  const config = {
    TeX: {
      extensions: ["color.js", "cancel.js"],
      Macros: {
        canc: ["{\\color{red}\\cancel{#1}}", 1],
      },
    },
    svg: {
      fontCache: "global",
    },
  };
  // state
  const [bobotArray, setBobotArray] = useState([]);
  const [hasilNormalisasi, setHasilNormalisasi] = useState([]);
  const [matrixNormalisai, setMatrixNormalisai] = useState([]);

  const calculateBobotArray = () => {
    const bobotArray = [];
    // Buat array kosong
    for (let i = 0; i < dtAlternatif.length; i++) {
      bobotArray[i] = new Array(dtKriteria.length).fill(0);
    }

    // Isi array dengan nilai bobot
    dtAlternatif.forEach((alternatif, i) => {
      dtKriteria.forEach((kriteria, j) => {
        const nilai = dtNilai.find(
          (item) =>
            item.alternatif_id === alternatif.id &&
            item.kriteria_id === kriteria.id
        );
        const maxOrMin = kriteria.jenis === "benefit" ? "max" : "min";
        const pembagi = Math[maxOrMin](
          ...dtNilai
            .filter((item) => item.kriteria_id === kriteria.id)
            .map((item) => parseFloat(item.bobot))
        );
        const pembagian =
          maxOrMin === "max"
            ? (nilai ? parseFloat(nilai.bobot) : 0) / pembagi
            : pembagi / (nilai ? parseFloat(nilai.bobot) : 0);
        // mengelompokan data untuk selanjutnya ditampung pada array
        bobotArray[i][j] = {
          jenis: kriteria.jenis,
          bobot: nilai ? parseFloat(nilai.bobot) : 0,
          alternatif_id: nilai?.alternatif_id,
          kriteria_id: nilai?.kriteria_id,
          pembagian: pembagian,
        };
      });
    });
    setBobotArray(bobotArray);
    const hasilNormalisasi = bobotArray.map((row) =>
      row.map((item) => ({
        jenis: item.jenis,
        hasil: item.pembagian.toFixed(3),
        alternatif_id: item?.alternatif_id,
        kriteria_id: item?.kriteria_id,
      }))
    );
    setHasilNormalisasi(hasilNormalisasi);
  };

  useEffect(() => {
    calculateBobotArray();
    return () => {};
  }, [dtAlternatif, dtKriteria, dtNilai]);

  useEffect(() => {
    const matrixNormalisai = hasilNormalisasi
      .map((row) => row.map((cell) => cell.hasil).join(" & "))
      .join(" \\\\ ");
    setMatrixNormalisai(matrixNormalisai);
  }, [hasilNormalisasi]);

  const matrixString = bobotArray
    .map((row) => row.map((cell) => cell.bobot.toString()).join(" & "))
    .join(" \\\\ ");

  return (
    <div className="overflow-hidden">
      <div>
        <h4 className="text-xl">Matriks Keputusan</h4>
        <div className="w-fit ml-4">
          <MathJaxContext>
            <MathJax>
              {`\\begin{matrix}
            X= & \\begin{bmatrix}
            ${matrixString}
            \\end{bmatrix}
          \\end{matrix}`}
            </MathJax>
          </MathJaxContext>
        </div>
      </div>
      {/* Normalisasi */}
      <div>
        {/* perhitungan */}
        <h4 className="text-xl">Normalisasi</h4>
        <div className="flex flex-wrap gap-x-10 gap-y-4 ml-4">
          <MathJaxContext version={3} config={config}>
            {bobotArray.length > 0 &&
              bobotArray[0].map((col, j) => (
                <div key={j} className="w-fit">
                  {bobotArray.map((row, i) => {
                    const maxOrMin = col.jenis === "benefit" ? "max" : "min";
                    const pembagi = Math[maxOrMin](
                      ...bobotArray.map((row) => row[j].bobot)
                    );
                    return (
                      <div key={`${i}${j}`}>
                        {/* jika benefit */}
                        {maxOrMin === "max" && (
                          <MathJax>{`$$r_{${i + 1}${j + 1}} = \\frac{${
                            row[j].bobot
                          }}{${maxOrMin}\\{${bobotArray
                            .map((row) => row[j].bobot)
                            .join("; ")}\\}} = \\frac{${
                            row[j].bobot
                          }}{${pembagi}} = ${row[j].pembagian.toFixed(
                            3
                          )}$$`}</MathJax>
                        )}
                        {/* jika cost */}
                        {maxOrMin === "min" && (
                          <MathJax>{`$$r_{${i + 1}${
                            j + 1
                          }} = \\frac{${maxOrMin}\\{${bobotArray
                            .map((row) => row[j].bobot)
                            .join("; ")}\\}}{${
                            row[j].bobot
                          }} = \\frac{${pembagi}}{${row[j].bobot}}= ${row[
                            j
                          ].pembagian.toFixed(3)}$$`}</MathJax>
                        )}
                      </div>
                    );
                  })}
                </div>
              ))}
          </MathJaxContext>
        </div>
        {/* menampilkan hasil */}
        <h4 className="text-xl">Hasil Normalisasi</h4>
        <div className="w-fit ml-4">
          <MathJaxContext>
            <MathJax>
              {`\\begin{matrix}
            X= & \\begin{bmatrix}
            ${matrixNormalisai}
            \\end{bmatrix}
          \\end{matrix}`}
            </MathJax>
          </MathJaxContext>
        </div>
      </div>
      {/* Perangkingan */}
      {hasilNormalisasi && <Perangkingan hasilNormalisasi={hasilNormalisasi} />}
    </div>
  );
};

export default Normalisasi;
